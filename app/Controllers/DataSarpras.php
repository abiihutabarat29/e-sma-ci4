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
        $datasarana = $this->saranaModel->findAll();
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
                'rules' => 'required|is_unique[mod_sarpras.prasarana]',
                'errors' => [
                    'required' => 'Jenis Prasarana harus di pilih.',
                    'is_unique' => 'Prasarana sudah ada.'
                ]
            ],
            'baik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kondisi Baik tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kondisi Baik harus angka.',
                ]
            ],
            'rusakr' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kondisi Rusak Ringan tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kondisi Rusak Ringan harus angka.',
                ]
            ],
            'rusakb' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kondisi Rusak Berat tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kondisi Rusak Berat harus angka.',
                ]
            ],
        ])) {
            return redirect()->to('/data-sarpras/add')->withInput();
        }
        $data = [
            'prasarana'           => $this->request->getPost('prasarana'),
            'baik'                => $this->request->getPost('baik'),
            'rusak_ringan'        => $this->request->getPost('rusakr'),
            'rusak_berat'        => $this->request->getPost('rusakb'),
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
        $ids = session()->get('id_sekolah');
        $datasarana = $this->saranaModel->findAll();
        $data = array(
            'titlebar' => 'Data Sarpras',
            'title' => 'Form Edit Data Sarpras',
            'isi' => 'master/data-sarpras/edit',
            'validation' => \Config\Services::validation(),
            'sarana' => $datasarana,
            'data' => $this->sarprasModel->where('id', $id)->where('id_sekolah', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $prasaranaLama = $this->sarprasModel->where(['id' => $id])->first();
        if ($prasaranaLama['prasarana'] == $this->request->getPost('prasarana')) {
            $rule_prasarana = 'required';
        } else {
            $rule_prasarana = 'required|numeric|is_unique[mod_sarpras.prasarana]';
        }
        //Validasi input
        if (!$this->validate([
            'prasarana' => [
                'rules' => $rule_prasarana,
                'errors' => [
                    'required' => 'Jenis Prasarana harus di pilih.',
                    'is_unique' => 'Prasarana sudah ada.'
                ]
            ],
            'baik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kondisi Baik tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kondisi Baik harus angka.',
                ]
            ],
            'rusakr' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kondisi Rusak Ringan tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kondisi Rusak Ringan harus angka.',
                ]
            ],
            'rusakb' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kondisi Rusak Berat tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kondisi Rusak Berat harus angka.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-sarpras/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'prasarana'           => $this->request->getPost('prasarana'),
            'baik'                => $this->request->getPost('baik'),
            'rusak_ringan'        => $this->request->getPost('rusakr'),
            'rusak_berat'        => $this->request->getPost('rusakb'),
            'keterangan'          => $this->request->getPost('ket'),
        ];
        $this->sarprasModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-sarpras'));
    }
}
