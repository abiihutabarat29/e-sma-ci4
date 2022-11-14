<?php

namespace App\Controllers;

use App\Models\InventarisBarangModel;
use CodeIgniter\Config\Config;

class DataBarang extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new InventarisBarangModel();
    }
    public function databarang()
    {
        $databarang = $this->barangModel->findAll();
        $data = array(
            'title' => 'Data Inventaris',
            'data' => $databarang,
            'isi' => 'master/data-barang/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Inventaris',
            'title' => 'Tambah Data Inventaris',
            'isi' => 'master/data-barang/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'inventaris' => [
                'rules' => 'required|is_unique[mod_barang.inventaris]',
                'errors' => [
                    'required' => 'Nama Inventaris tidak boleh kosong.',
                    'is_unique' => 'Nama Inventaris sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to('/data-inventaris-barang/add')->withInput();
        }
        $data = [
            'inventaris'  => $this->request->getPost('inventaris'),
            'userentry'   => session()->get('nama'),
        ];
        $this->barangModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-inventaris-barang'));
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-inventaris-barang'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Inventaris',
            'title' => 'Edit Data Inventaris',
            'isi' => 'master/data-barang/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->barangModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $inventarisLama = $this->barangModel->where(['id' => $id])->first();
        if ($inventarisLama['inventaris'] == $this->request->getPost('inventaris')) {
            $rule_inventaris = 'required';
        } else {
            $rule_inventaris = 'required|is_unique[mod_barang.inventaris]';
        }
        //Validasi input
        if (!$this->validate([
            'inventaris' => [
                'rules' => $rule_inventaris,
                'errors' => [
                    'required' => 'Nama Inventaris tidak boleh kosong.',
                    'is_unique' => 'Nama Inventaris sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-inventaris-barang/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'inventaris'  => $this->request->getPost('inventaris'),
            'userentry'   => session()->get('nama'),
        ];
        $this->barangModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-inventaris-barang'));
    }
}
