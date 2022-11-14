<?php

namespace App\Controllers;

use App\Models\BukuIndukModel;
use App\Models\SiswaModel;
use App\Models\TaModel;
use CodeIgniter\Config\Config;

class BukuInduk extends BaseController
{
    protected $bukuindukModel;
    protected $siswaModel;
    protected $taModel;
    public function __construct()
    {
        $this->bukuindukModel = new BukuIndukModel();
        $this->siswaModel = new SiswaModel();
        $this->taModel = new TaModel();
    }
    public function bukuinduk()
    {
        $npsn = session()->get('npsn');
        $where = "npsn='$npsn'";
        $datasiswa = $this->bukuindukModel->where($where)->findAll();
        $data = array(
            'title' => 'Buku Induk Siswa',
            'datasiswa' => $datasiswa,
            'isi' => 'master/buku-induk/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $tahun = $this->taModel->findAll();
        $npsn = session()->get('npsn');
        $datasiswa = $this->siswaModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'titlebar' => 'Buku Induk Siswa',
            'title' => 'Tambah Buku Induk Siswa',
            'isi' => 'master/buku-induk/add',
            'siswa' => $datasiswa,
            'tahun' => $tahun,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        if (session()->get('level') == '1') {
            //Validasi input
            if (!$this->validate([
                'tamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Siswa harus di pilih.',
                    ]
                ],
                'thntamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Tamat harus di pilih.',
                    ]
                ],
            ])) {
                return redirect()->to('/buku-induk/add')->withInput();
            }
            $id = $this->request->getPost('tamat');
            $data = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nama'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'agama'               => $this->request->getPost('agama'),
                'alamat'              => $this->request->getPost('alamat'),
                'kelas'               => $this->request->getPost('kelas'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'status'              => 'Non-Aktif',
                'nohp'                => $this->request->getPost('nohp'),
                'masuk'               => $this->request->getPost('thnmasuk'),
                'tamat'               => $this->request->getPost('thntamat'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->bukuindukModel->save($data);
            $this->siswaModel->delete($id);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('buku-induk'));
        } elseif (session()->get('level') == '2') {
            //Validasi input
            if (!$this->validate([
                'tamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Siswa harus di pilih.',
                    ]
                ],
                'thntamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Tamat harus di pilih.',
                    ]
                ],
            ])) {
                return redirect()->to('/buku-induk/add')->withInput();
            }
            $id = $this->request->getPost('tamat');
            $data = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nama'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'agama'               => $this->request->getPost('agama'),
                'alamat'              => $this->request->getPost('alamat'),
                'kelas'               => $this->request->getPost('kelas'),
                'pkeahlian'           => $this->request->getPost('paketk'),
                'status'              => 'Non-Aktif',
                'nohp'                => $this->request->getPost('nohp'),
                'masuk'               => $this->request->getPost('thnmasuk'),
                'tamat'               => $this->request->getPost('thntamat'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->bukuindukModel->save($data);
            $this->siswaModel->delete($id);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('buku-induk'));
        }
    }

    public function delete($id)
    {
        $this->bukuindukModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('buku-induk'));
    }
}
