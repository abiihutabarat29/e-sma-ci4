<?php

namespace App\Controllers;

use App\Models\PaketModel;
use CodeIgniter\Config\Config;

class DataPaket extends BaseController
{
    protected $paketModel;
    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }
    public function datapaket()
    {
        $datapaket = $this->paketModel->findAll();
        $data = array(
            'title' => 'Data Paket Keahlian',
            'data' => $datapaket,
            'isi' => 'master/data-paket/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Paket Keahlian',
            'title' => 'Tambah Data Paket Keahlian',
            'isi' => 'master/data-paket/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|numeric|max_length[4]|min_length[4]|is_unique[mod_paket_keahlian.kode]',
                'errors' => [
                    'required' => 'Kode tidak boleh kosong.',
                    'is_unique' => 'Kode sudah ada.',
                    'max_length' => 'Kode maximal 4 digit.',
                    'min_length' => 'Kode minimal 4 digit.',
                ]
            ],
            'paket' => [
                'rules' => 'required|is_unique[mod_paket_keahlian.paket_keahlian]',
                'errors' => [
                    'required' => 'Nama Paket Keahlian tidak boleh kosong.',
                    'is_unique' => 'Nama Paket Keahlian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to('/data-paket-keahlian/add')->withInput();
        }
        $data = [
            'kode'        => $this->request->getPost('kode'),
            'paket_keahlian'       => $this->request->getPost('paket'),
            'userentry'   => session()->get('nama'),
        ];
        $this->paketModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-paket-keahlian'));
    }

    public function delete($id)
    {
        $this->paketModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-paket-keahlian'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Paket Keahlian',
            'title' => 'Edit Data Paket Keahlian',
            'isi' => 'master/data-paket/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->paketModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $kodeLama = $this->paketModel->where(['id' => $id])->first();
        if ($kodeLama['kode'] == $this->request->getPost('kode')) {
            $rule_kode = 'required|numeric|max_length[4]|min_length[4]';
        } else {
            $rule_kode = 'required|numeric|max_length[4]|min_length[4]|is_unique[mod_paket_keahlian.kode]';
        }
        $paketLama = $this->paketModel->where(['id' => $id])->first();
        if ($paketLama['paket_keahlian'] == $this->request->getPost('paket')) {
            $rule_paket = 'required';
        } else {
            $rule_paket = 'required|is_unique[mod_paket_keahlian.paket_keahlian]';
        }
        //Validasi input
        if (!$this->validate([
            'kode' => [
                'rules' => $rule_kode,
                'errors' => [
                    'required' => 'Kode tidak boleh kosong.',
                    'is_unique' => 'Kode sudah ada.',
                    'max_length' => 'Kode maximal 4 digit.',
                    'min_length' => 'Kode minimal 4 digit.',
                ]
            ],
            'paket' => [
                'rules' => $rule_paket,
                'errors' => [
                    'required' => 'Nama Pake Keahlian tidak boleh kosong.',
                    'is_unique' => 'Nama Pake Keahlian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-paket-keahlian/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'kode'                => $this->request->getPost('kode'),
            'paket_keahlian'      => $this->request->getPost('paket'),
            'userentry'           => session()->get('nama'),
        ];
        $this->paketModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-paket-keahlian'));
    }
}
