<?php

namespace App\Controllers;

use App\Models\SaranaModel;
use CodeIgniter\Config\Config;

class DataSarana extends BaseController
{
    protected $saranaModel;
    public function __construct()
    {
        $this->saranaModel = new SaranaModel();
    }
    public function datasarana()
    {
        $datasarana = $this->saranaModel->findAll();
        $data = array(
            'title' => 'Data Sarana',
            'datasarana' => $datasarana,
            'isi' => 'master/data-sarana/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Sarana',
            'title' => 'Form Tambah Data Sarana',
            'isi' => 'master/data-sarana/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'sarana' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Sarana tidak boleh kosong.',
                    'alpha_space' => 'Nama Sarana harus huruf dan spasi.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to('/data-sarana/add')->withInput();
        }
        $data = [
            'sarana'       => $this->request->getPost('sarana'),
            'jenjang'     => $this->request->getPost('jenjang'),
            'userentry'   => session()->get('nama'),
        ];
        $this->saranaModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-sarana'));
    }

    public function delete($id)
    {
        $this->saranaModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-sarana'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Sarana',
            'title' => 'Form Edit Data Sarana',
            'isi' => 'master/data-sarana/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->saranaModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'sarana' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Sarana tidak boleh kosong.',
                    'alpha_space' => 'Nama Sarana harus huruf dan spasi.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang harus di pilih.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-sarana/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'sarana'       => $this->request->getPost('sarana'),
            'jenjang'     => $this->request->getPost('jenjang'),
            'userentry'   => session()->get('nama'),
        ];
        $this->saranaModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-sarana'));
    }
}
