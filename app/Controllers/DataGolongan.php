<?php

namespace App\Controllers;

use App\Models\GolonganModel;
use CodeIgniter\Config\Config;

class DataGolongan extends BaseController
{
    protected $golonganModel;
    public function __construct()
    {
        $this->golonganModel = new GolonganModel();
    }
    public function datagolongan()
    {
        $datagol = $this->golonganModel->findAll();
        $data = array(
            'title' => 'Data Golongan',
            'golongan' => $datagol,
            'isi' => 'master/data-golongan/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Golongan',
            'title' => 'Form Tambah Data Golongan',
            'isi' => 'master/data-golongan/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'golongan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Golongan tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('/data-golongan/add')->withInput();
        }
        $data = [
            'golongan'       => $this->request->getPost('golongan'),
            'userentry'   => session()->get('nama'),
        ];
        $this->golonganModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-golongan'));
    }

    public function delete($id)
    {
        $this->golonganModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-golongan'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Golongan',
            'title' => 'Form Edit Data Golongan',
            'isi' => 'master/data-golongan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->golonganModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'golongan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Golongan tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-golongan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'golongan'       => $this->request->getPost('golongan'),
            'userentry'   => session()->get('nama'),
        ];
        $this->golonganModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-golongan'));
    }
}
