<?php

namespace App\Controllers;

use App\Models\TaModel;
use CodeIgniter\Config\Config;

class DataTa extends BaseController
{
    protected $taModel;
    public function __construct()
    {
        $this->taModel = new TaModel();
    }
    public function datata()
    {
        $datata = $this->taModel->findAll();
        $data = array(
            'title' => 'Data Tahun Akademik',
            'data' => $datata,
            'isi' => 'master/data-ta/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Tahun Akademik',
            'title' => 'Form Tambah Data Tahun Akademik',
            'isi' => 'master/data-ta/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'ta' => [
                'rules' => 'required|is_unique[mod_ta.tahun_akademik]',
                'errors' => [
                    'required' => 'Tahun Akademik tidak boleh kosong.',
                    'is_unique' => 'Tahun Akademik sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to('/data-tahun-akademik/add')->withInput();
        }
        $data = [
            'tahun_akademik'       => $this->request->getPost('ta'),
            'userentry'   => session()->get('nama'),
        ];
        $this->taModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-tahun-akademik'));
    }

    public function delete($id)
    {
        $this->taModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-tahun-akademik'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Tahun Akademik',
            'title' => 'Form Edit Data Tahun Akademik',
            'isi' => 'master/data-ta/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->taModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'ta' => [
                'rules' => 'required|is_unique[mod_ta.tahun_akademik]',
                'errors' => [
                    'required' => 'Tahun Akademik tidak boleh kosong.',
                    'is_unique' => 'Tahun Akademik sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-tahun-akademik/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'tahun_akademik'       => $this->request->getPost('ta'),
            'userentry'   => session()->get('nama'),
        ];
        $this->taModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-tahun-akademik'));
    }
}
