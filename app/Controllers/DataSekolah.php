<?php

namespace App\Controllers;

use App\Models\SekolahModel;
use App\Models\KabupatenModel;
use App\Models\ProfilModel;
use CodeIgniter\Config\Config;

class DataSekolah extends BaseController
{
    protected $sekolahModel;
    protected $kabupatenModel;
    protected $profilModel;
    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
        $this->kabupatenModel = new KabupatenModel();
        $this->profilModel = new ProfilModel();
    }
    public function datasekolah()
    {
        $datasekolah = $this->sekolahModel->findAll();
        $data = array(
            'title' => 'Data Sekolah',
            'datasekolah' => $datasekolah,
            'isi' => 'master/data-sekolah/data'
        );

        return view('layout/wrapper', $data);
    }
    public function sekolah()
    {
        $jenjang = session()->get('jenjang');
        $datasekolah = $this->sekolahModel->where('jenjang =', $jenjang)->findAll();
        $profilsekolah = $this->profilModel->where('jenjang =', $jenjang)->findAll();
        $data = array(
            'title' => 'Daftar Sekolah',
            'sekolah' => $datasekolah,
            'profil' => $profilsekolah,
            'isi' => 'master/data-sekolah/sekolah'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $datakab = $this->kabupatenModel->findAll();
        $data = array(
            'titlebar' => 'Data Sekolah',
            'title' => 'Form Tambah Data Sekolah',
            'isi' => 'master/data-sekolah/add',
            'kab' => $datakab,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'npsn' => [
                'rules' => 'required|numeric|max_length[8]|min_length[8]|is_unique[mod_user.npsn]',
                'errors' => [
                    'required' => 'NPSN tidak boleh kosong.',
                    'numeric' => 'NPSN harus angka.',
                    'max_length' => 'NPSN maximal 8 digit.',
                    'min_length' => 'NPSN minimal 8 digit.',
                    'is_unique' => 'NPSN sudah ada.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang tidak harus dipilih.',
                ]
            ],
            'sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sekolah tidak boleh kosong.',
                ]
            ],
            'kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kabupaten harus dipilih.',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Sekolah harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to('/data-sekolah/add')->withInput();
        }
        $data = [
            'npsn'                => $this->request->getPost('npsn'),
            'jenjang'             => $this->request->getPost('jenjang'),
            'sekolah'             => $this->request->getPost('sekolah'),
            'kabupaten'           => $this->request->getPost('kabupaten'),
            'status_sekolah'      => $this->request->getPost('status'),
            'userentry'           => session()->get('nama'),
        ];
        $this->sekolahModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-sekolah'));
    }

    public function delete($id)
    {
        $this->sekolahModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-sekolah'));
    }

    public function edit($id)
    {
        $datakab = $this->kabupatenModel->findAll();
        $data = array(
            'titlebar' => 'Data Sekolah',
            'title' => 'Form Edit Data Sekolah',
            'isi' => 'master/data-sekolah/edit',
            'validation' => \Config\Services::validation(),
            'kab' => $datakab,
            'data' => $this->sekolahModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $npsnLama = $this->sekolahModel->where(['id' => $id])->first();
        if ($npsnLama['npsn'] == $this->request->getPost('npsn')) {
            $rule_npsn = 'required|numeric|max_length[8]|min_length[8]';
        } else {
            $rule_npsn = 'required|numeric|max_length[8]|min_length[8]|is_unique[mod_user.npsn]';
        }
        //Validasi input
        if (!$this->validate([
            'npsn' => [
                'rules' => $rule_npsn,
                'errors' => [
                    'required' => 'NPSN tidak boleh kosong.',
                    'numeric' => 'NPSN harus angka.',
                    'max_length' => 'NPSN maximal 8 digit.',
                    'min_length' => 'NPSN minimal 8 digit.',
                    'is_unique' => 'NPSN sudah ada.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang tidak harus dipilih.',
                ]
            ],
            'sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sekolah tidak boleh kosong.',
                ]
            ],
            'kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kabupaten harus dipilih.',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Sekolah harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-sekolah/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'npsn'                => $this->request->getPost('npsn'),
            'jenjang'             => $this->request->getPost('jenjang'),
            'sekolah'             => $this->request->getPost('sekolah'),
            'kabupaten'           => $this->request->getPost('kabupaten'),
            'status_sekolah'      => $this->request->getPost('status'),
            'userentry'           => session()->get('nama'),
        ];
        $this->sekolahModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-sekolah'));
    }
}
