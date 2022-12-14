<?php

namespace App\Controllers;

use App\Models\KeluarModel;
use App\Models\SiswaModel;
use App\Models\TaModel;
use CodeIgniter\Config\Config;

class SiswaKeluar extends BaseController
{
    protected $keluarModel;
    protected $siswaModel;
    protected $taModel;
    public function __construct()
    {
        $this->keluarModel = new KeluarModel();
        $this->siswaModel = new SiswaModel();
        $this->taModel = new TaModel();
    }
    public function datasiswak()
    {
        $npsn = session()->get('npsn');
        $where = "npsn='$npsn' AND mutasi='keluar'";
        $datasiswak = $this->keluarModel->where($where)->findAll();
        $data = array(
            'title' => 'Mutasi Siswa Keluar',
            'datasiswak' => $datasiswak,
            'isi' => 'master/data-siswa-keluar/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $tahun = $this->taModel->findAll();
        $npsn = session()->get('npsn');
        $datasiswa = $this->siswaModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'titlebar' => 'Mutasi Siswa Keluar',
            'title' => 'Tambah Mutasi Siswa Keluar',
            'isi' => 'master/data-siswa-keluar/add',
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
                'siswa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Siswa harus di pilih.',
                    ]
                ],
                'thnkeluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Keluar harus di pilih.',
                    ]
                ],
                'nosurat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat tidak boleh kosong.',
                    ]
                ],
            ])) {
                return redirect()->to('/data-siswa-keluar/add')->withInput();
            }
            $id = $this->request->getPost('siswa');
            $data = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nama'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'kelas'               => $this->request->getPost('kelas'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'asal_sekolah'        => $this->request->getPost('asal'),
                'tahun'               => $this->request->getPost('thnkeluar'),
                'no_surat'            => $this->request->getPost('nosurat'),
                'keterangan'          => $this->request->getPost('ket'),
                'mutasi'              => 'keluar',
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->keluarModel->save($data);
            $this->siswaModel->delete($id);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-siswa-keluar'));
        } elseif (session()->get('level') == '2') {
            //Validasi input
            if (!$this->validate([
                'siswa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Siswa harus di pilih.',
                    ]
                ],
                'thnkeluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Keluar harus di pilih.',
                    ]
                ],
                'nosurat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat tidak boleh kosong.',
                    ]
                ],
            ])) {
                return redirect()->to('/data-siswa-keluar/add')->withInput();
            }
            $id = $this->request->getPost('siswa');
            $data = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nama'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'kelas'               => $this->request->getPost('kelas'),
                'pkeahlian'           => $this->request->getPost('paketk'),
                'asal_sekolah'        => $this->request->getPost('asal'),
                'tahun'               => $this->request->getPost('thnkeluar'),
                'no_surat'            => $this->request->getPost('nosurat'),
                'keterangan'          => $this->request->getPost('ket'),
                'mutasi'              => 'keluar',
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->keluarModel->save($data);
            $this->siswaModel->delete($id);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-siswa-keluar'));
        }
    }

    public function delete($id)
    {
        $this->keluarModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-siswa-keluar'));
    }
}
