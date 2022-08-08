<?php

namespace App\Controllers;

use App\Models\SarprasModel;
use App\Models\SaranaModel;
use CodeIgniter\Config\Config;

class DataSarpras extends BaseController
{
    protected $sarprasModel;
    protected $saranaModel;
    public function __construct()
    {
        $this->sarprasModel = new SarprasModel();
        $this->saranaModel = new SaranaModel();
    }
    public function datasarpras()
    {
        $npsn = session()->get('npsn');
        $datasarpras = $this->sarprasModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Data Sarpras',
            'datasarpras' => $datasarpras,
            'isi' => 'master/data-sarpras/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $jenjang = session()->get('jenjang');
        $datasarana = $this->saranaModel->where('jenjang =', $jenjang)->findAll();
        $data = array(
            'titlebar' => 'Data Sarpras',
            'title' => 'Form Tambah Data Sarpras',
            'isi' => 'master/data-sarpras/add',
            'sarana' => $datasarana,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'prasarana' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Prasarana harus di pilih.',
                ]
            ],
            'kondisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi harus di pilih.',
                ]
            ],
            'jumlah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah harus angka.',
                ]
            ],
        ])) {
            return redirect()->to('/data-sarpras/add')->withInput();
        }
        $data = [
            'prasarana'           => $this->request->getPost('prasarana'),
            'kondisi'             => $this->request->getPost('kondisi'),
            'jumlah'              => $this->request->getPost('jumlah'),
            'keterangan'          => $this->request->getPost('ket'),
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->sarprasModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-sarpras'));
    }

    public function delete($id)
    {
        $this->sarprasModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-sarpras'));
    }

    public function edit($id)
    {
        $jenjang = session()->get('jenjang');
        $datasarana = $this->saranaModel->where('jenjang =', $jenjang)->findAll();
        $data = array(
            'titlebar' => 'Data Sarpras',
            'title' => 'Form Edit Data Sarpras',
            'isi' => 'master/data-sarpras/edit',
            'validation' => \Config\Services::validation(),
            'sarana' => $datasarana,
            'data' => $this->sarprasModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'prasarana' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Prasarana harus di pilih.',
                ]
            ],
            'kondisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi harus di pilih.',
                ]
            ],
            'jumlah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah harus angka.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-sarpras/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'prasarana'           => $this->request->getPost('prasarana'),
            'kondisi'             => $this->request->getPost('kondisi'),
            'jumlah'              => $this->request->getPost('jumlah'),
            'keterangan'          => $this->request->getPost('ket'),
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->sarprasModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-sarpras'));
    }
}
