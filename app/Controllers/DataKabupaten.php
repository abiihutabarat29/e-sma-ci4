<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use CodeIgniter\Config\Config;

class DataKabupaten extends BaseController
{
    protected $kabupatenModel;
    public function __construct()
    {
        $this->kabupatenModel = new KabupatenModel();
    }
    public function datakab()
    {
        $datakab = $this->kabupatenModel->findAll();
        $data = array(
            'title' => 'Data Kabupaten',
            'datakab' => $datakab,
            'isi' => 'master/data-kabupaten/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Kabupaten',
            'title' => 'Tambah Data Kabupaten',
            'isi' => 'master/data-kabupaten/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|numeric|max_length[4]|min_length[4]|is_unique[mod_kabupaten.kode_wilayah]',
                'errors' => [
                    'required' => 'Kode Wilayah tidak boleh kosong.',
                    'numeric' => 'Kode Wilayah harus angka.',
                    'max_length' => 'Kode Wilayah maximal 4 digit.',
                    'min_length' => 'Kode Wilayah minimal 4 digit.',
                    'is_unique' => 'Kode Wilayah sudah ada.'
                ]
            ],
            'kabupaten' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kabupaten tidak boleh kosong.',
                    'alpha_space' => 'Nama Kabupaten harus huruf dan spasi.'
                ]
            ],
        ])) {
            return redirect()->to('/data-kabupaten/add')->withInput();
        }
        $data = [
            'kode_wilayah'       => $this->request->getPost('kode'),
            'kabupaten'          => $this->request->getPost('kabupaten'),
            'userentry'          => session()->get('nama'),
        ];
        $this->kabupatenModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-kabupaten'));
    }

    public function delete($id)
    {
        $this->kabupatenModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-kabupaten'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Kabupaten',
            'title' => 'Edit Data Kabupaten',
            'isi' => 'master/data-kabupaten/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->kabupatenModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $kodeLama = $this->kabupatenModel->where(['id' => $id])->first();
        if ($kodeLama['kode_wilayah'] == $this->request->getPost('kode')) {
            $rule_kode = 'required|numeric|max_length[4]|min_length[4]';
        } else {
            $rule_kode = 'required|numeric|max_length[4]|min_length[4]|is_unique[[mod_kabupaten.kode_wilayah]';
        }
        //Validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => $rule_kode,
                'errors' => [
                    'required' => 'Kode Wilayah tidak boleh kosong.',
                    'numeric' => 'Kode Wilayah harus angka.',
                    'max_length' => 'Kode Wilayah maximal 4 digit.',
                    'min_length' => 'Kode Wilayah minimal 4 digit.',
                    'is_unique' => 'Kode Wilayah sudah ada.'
                ]
            ],
            'kabupaten' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kabupaten tidak boleh kosong.',
                    'alpha_space' => 'Nama Kabupaten harus huru dan spasi.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-kabupaten/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'kode_wilayah'        => $this->request->getPost('kode'),
            'kabupaten'           => $this->request->getPost('kabupaten'),
            'userentry'           => session()->get('nama'),
        ];
        $this->kabupatenModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-kabupaten'));
    }
}
