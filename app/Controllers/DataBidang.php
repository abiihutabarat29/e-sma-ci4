<?php

namespace App\Controllers;

use App\Models\BidangModel;
use CodeIgniter\Config\Config;

class DataBidang extends BaseController
{
    protected $bidangModel;
    public function __construct()
    {
        $this->bidangModel = new BidangModel();
    }
    public function databidang()
    {
        $databidang = $this->bidangModel->findAll();
        $data = array(
            'title' => 'Data Bidang Keahlian',
            'data' => $databidang,
            'isi' => 'master/data-bidang/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Bidang Keahlian',
            'title' => 'Tambah Data Bidang Keahlian',
            'isi' => 'master/data-bidang/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'bidang' => [
                'rules' => 'required|is_unique[mod_bidang_keahlian.bidang]',
                'errors' => [
                    'required' => 'Nama Bidang Keahlian tidak boleh kosong.',
                    'is_unique' => 'Nama Bidang Keahlian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to('/data-bidang-keahlian/add')->withInput();
        }
        $data = [
            'bidang'       => $this->request->getPost('bidang'),
            'userentry'   => session()->get('nama'),
        ];
        $this->bidangModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-bidang-keahlian'));
    }

    public function delete($id)
    {
        $this->bidangModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-bidang-keahlian'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Bidang Keahlian',
            'title' => 'Edit Data Bidang Keahlian',
            'isi' => 'master/data-bidang/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->bidangModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $bidangLama = $this->bidangModel->where(['id' => $id])->first();
        if ($bidangLama['bidang'] == $this->request->getPost('bidang')) {
            $rule_bidang = 'required';
        } else {
            $rule_bidang = 'required|is_unique[mod_bidang_keahlian.bidang]';
        }
        //Validasi input
        if (!$this->validate([
            'bidang' => [
                'rules' => $rule_bidang,
                'errors' => [
                    'required' => 'Nama Bidang Keahlian tidak boleh kosong.',
                    'is_unique' => 'Nama Bidang Keahlian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-bidang-keahlian/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'bidang'       => $this->request->getPost('bidang'),
            'userentry'   => session()->get('nama'),
        ];
        $this->bidangModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-bidang-keahlian'));
    }
}
