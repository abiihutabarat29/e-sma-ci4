<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\LogValidModel;
use App\Models\LogInvalidModel;
use CodeIgniter\Config\Config;

class Auth extends BaseController
{
    protected $authModel;
    protected $logvalidModel;
    protected $loginvalidModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->logvalidModel = new LogValidModel();
        $this->loginvalidModel = new LogInvalidModel();
    }

    public function index()
    {
        $data = array(
            'title' => 'e-sekolah',
            'validation' => \Config\Services::validation()
        );
        return view('auth/login', $data);
    }
    public function cek()
    {
        if ($this->validate([
            'username' =>  [
                'label' => 'Username',
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'max_length' => 'Username melebihi batas maksimal.',
                ],
            ],
            'password' =>  [
                'label' => 'Password',
                'rules' => 'required|max_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                ],
            ],
        ])) {
            // Jika Valid Form
            // =======================
            //Mencegah brute force
            $ip = $this->request->getIPAddress();
            $timestamp = date("Y-m-d ");
            $cek_ip = $this->authModel->cek_error($ip, 0, $timestamp);
            //fecth data timestamp
            $data = $this->loginvalidModel->findAll();
            foreach ($data as $r) :
                $expired = $r['timestamp'];
            endforeach;
            $limit = 4;
            //validasi ip dan timestamp
            if ($cek_ip > $limit && $expired == date('Y-m-d')) {
                session()->setFlashdata('m', 'Maaf anda tidak bisa login hari ini' . "\n" . 'Silahkan coba lagi besok . . .');
                return redirect()->to(base_url('/'));
                return false;
            }
            $username = $this->request->getPost('username');
            $passwordFill = $this->request->getPost('password');
            $password = md5($passwordFill);
            $cek = $this->authModel->login($username, $password);
            if ($cek) {
                if (password_verify($password, $cek['password'])) {
                    //jika data cocok
                    session()->set('log', true);
                    session()->set('id', $cek['id']);
                    session()->set('id_sekolah', $cek['id_sekolah']);
                    session()->set('npsn', $cek['npsn']);
                    session()->set('nama_sekolah', $cek['nama_sekolah']);
                    session()->set('jenjang', $cek['jenjang']);
                    session()->set('nik', $cek['nik']);
                    session()->set('nama', $cek['nama']);
                    session()->set('nohp', $cek['nohp']);
                    session()->set('email', $cek['email']);
                    session()->set('username', $cek['username']);
                    session()->set('foto', $cek['foto']);
                    session()->set('level', $cek['level']);
                    session()->set('status', $cek['status']);
                    //simpan status log
                    $username =  session()->get('username');
                    $nama =  session()->get('nama');
                    $foto =  session()->get('foto');
                    $timestamp = date("Y-m-d H:i:s");
                    $ip = $this->request->getIPAddress();
                    $useragent = $this->request->getUserAgent();
                    $data = [
                        'username'   => $username,
                        'nama'       => $nama,
                        'foto'       => $foto,
                        'status_log' => 1,
                        'timestamp'  => $timestamp,
                        'ip'         => $ip,
                        'useragent'  => $useragent,
                    ];
                    $this->logvalidModel->save($data);
                    //login sukses
                    return redirect()->to(base_url('/home'));
                } else {
                    //simpan status log
                    $username = $this->request->getPost('username');
                    $password = $this->request->getPost('password');
                    $timestamp = date("Y-m-d");
                    $ip = $this->request->getIPAddress();
                    $useragent = $this->request->getUserAgent();
                    $cek_ip = $this->authModel->cek_error($ip, 0, $timestamp);
                    $limit = 4;
                    $opportunity = $limit - $cek_ip;
                    $data = [
                        'username'   => $username,
                        'password'   => $password,
                        'status_log' => 0,
                        'timestamp'  => $timestamp,
                        'ip'         => $ip,
                        'useragent'  => $useragent,
                    ];
                    $this->loginvalidModel->save($data);
                    //jika tidak data cocok
                    session()->setFlashdata('m', 'LOGIN GAGAL! PASSWORD SALAH.' . "\n" . ' Kesempatan Mencoba ' . $opportunity . ' Kali Lagi');
                    return redirect()->to(base_url('/'));
                }
            } else {
                //simpan status log
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $timestamp = date("Y-m-d");
                $ip = $this->request->getIPAddress();
                $useragent = $this->request->getUserAgent();
                $cek_ip = $this->authModel->cek_error($ip, 0, $timestamp);
                $limit = 4;
                $opportunity = $limit - $cek_ip;
                $data = [
                    'username'   => $username,
                    'password'   => $password,
                    'status_log' => 0,
                    'timestamp'  => $timestamp,
                    'ip'         => $ip,
                    'useragent'  => $useragent,
                ];
                $this->loginvalidModel->save($data);
                //jika tidak data cocok
                session()->setFlashdata('m', 'PASSWORD & USERNAME SALAH.' . "\n" . ' Kesempatan Mencoba ' . $opportunity . ' Kali Lagi');
                return redirect()->to(base_url('/'));
            }
        } else {
            //Jika tidak valid
            $validation = \Config\Services::validation();
            return redirect()->to('/')->withInput()->with('validation', $validation);
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('id');
        session()->remove('id_sekolah');
        session()->remove('npsn');
        session()->remove('nama_sekolah');
        session()->remove('jenjang');
        session()->remove('nik');
        session()->remove('nama');
        session()->remove('nohp');
        session()->remove('email');
        session()->remove('username');
        session()->remove('foto');
        session()->remove('level');
        session()->remove('status');
        session()->setFlashdata('ml', 'LOGOUT BERHASIL');
        return redirect()->to(base_url('/'));
    }

    //--------------------------------------------------------------------
}
