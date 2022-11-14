<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\KabupatenModel;
use CodeIgniter\Config\Config;

class DataKecamatan extends BaseController
{
    protected $kecamatanModel;
    protected $kabupatenModel;
    public function __construct()
    {
        $this->kecamatanModel = new KecamatanModel();
        $this->kabupatenModel = new KabupatenModel();
    }
    public function datakec()
    {
        $datakec = $this->kecamatanModel->findAll();
        $data = array(
            'title' => 'Data Kecamatan',
            'datakec' => $datakec,
            'isi' => 'master/data-kecamatan/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $datakab = $this->kabupatenModel->findAll();
        $data = array(
            'titlebar' => 'Data Kecamatan',
            'title' => 'Tambah Data Kecamatan',
            'isi' => 'master/data-kecamatan/add',
            'kab' => $datakab,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|numeric|max_length[6]|min_length[6]|is_unique[mod_kecamatan.kode_wilayah]',
                'errors' => [
                    'required' => 'Kode Wilayah tidak boleh kosong.',
                    'numeric' => 'Kode Wilayah harus angka.',
                    'max_length' => 'Kode Wilayah maximal 6 digit.',
                    'min_length' => 'Kode Wilayah minimal 6 digit.',
                    'is_unique' => 'Kode Wilayah sudah ada.'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kecamatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Kecamatan harus huruf dan spasi.'
                ]
            ],
            'kab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Kabupaten harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to('/data-kecamatan/add')->withInput();
        }
        $data = [
            'kode_wilayah'       => $this->request->getPost('kode'),
            'kecamatan'          => $this->request->getPost('kecamatan'),
            'kode_kab'           => $this->request->getPost('kab'),
            'userentry'          => session()->get('nama'),
        ];
        $this->kecamatanModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-kecamatan'));
    }

    public function delete($id)
    {
        $this->kecamatanModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-kecamatan'));
    }

    public function edit($id)
    {
        $datakab = $this->kabupatenModel->findAll();
        $data = array(
            'titlebar' => 'Data Kecamatan',
            'title' => 'Edit Data Kecamatan',
            'isi' => 'master/data-kecamatan/edit',
            'kab' => $datakab,
            'validation' => \Config\Services::validation(),
            'data' => $this->kecamatanModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $kodeLama = $this->kecamatanModel->where(['id' => $id])->first();
        if ($kodeLama['kode_wilayah'] == $this->request->getPost('kode')) {
            $rule_kode = 'required|numeric|max_length[6]|min_length[6]';
        } else {
            $rule_kode = 'required|numeric|max_length[6]|min_length[6]|is_unique[mod_kecamatan.kode_wilayah]';
        }
        //Validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => $rule_kode,
                'errors' => [
                    'required' => 'Kode Wilayah tidak boleh kosong.',
                    'numeric' => 'Kode Wilayah harus angka.',
                    'max_length' => 'Kode Wilayah maximal 6 digit.',
                    'min_length' => 'Kode Wilayah minimal 6 digit.',
                    'is_unique' => 'Kode Wilayah sudah ada.'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kecamatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Kecamatan harus huruf dan spasi.'
                ]
            ],
            'kab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Kabupaten harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-kecamatan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'kode_wilayah'       => $this->request->getPost('kode'),
            'kecamatan'          => $this->request->getPost('kecamatan'),
            'kode_kab'           => $this->request->getPost('kab'),
            'userentry'          => session()->get('nama'),
        ];
        $this->kecamatanModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-kecamatan'));
    }
}
