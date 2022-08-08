<?php

namespace App\Controllers;

use App\Models\MapelModel;
use CodeIgniter\Config\Config;

class DataMapel extends BaseController
{
    protected $mapelModel;
    public function __construct()
    {
        $this->mapelModel = new MapelModel();
    }
    public function datamapel()
    {
        $datamapel = $this->mapelModel->findAll();
        $data = array(
            'title' => 'Data Mata Pelajaran',
            'datamapel' => $datamapel,
            'isi' => 'master/data-mapel/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Mata Pelajaran',
            'title' => 'Form Tambah Data Mata Pelajaran',
            'isi' => 'master/data-mapel/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'mapel' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Mata Pelajaran tidak boleh kosong.',
                    'alpha_space' => 'Nama Mata Pelajaran harus huruf dan spasi.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to('/data-mapel/add')->withInput();
        }
        $data = [
            'mapel'       => $this->request->getPost('mapel'),
            'jenjang'     => $this->request->getPost('jenjang'),
            'userentry'   => session()->get('nama'),
        ];
        $this->mapelModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-mapel'));
    }

    public function delete($id)
    {
        $this->mapelModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-mapel'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Mata Pelajaran',
            'title' => 'Form Edit Data Mata Pelajaran',
            'isi' => 'master/data-mapel/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->mapelModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'mapel' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Mata Pelajaran tidak boleh kosong.',
                    'alpha_space' => 'Nama Mata Pelajaran harus huruf dan spasi.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-mapel/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'mapel'       => $this->request->getPost('mapel'),
            'jenjang'     => $this->request->getPost('jenjang'),
            'userentry'   => session()->get('nama'),
        ];
        $this->mapelModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-mapel'));
    }
}
