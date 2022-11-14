<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\InventarisBarangModel;
use CodeIgniter\Config\Config;

class DataInventaris extends BaseController
{
    protected $inventarisModel;
    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
        $this->barangModel = new InventarisBarangModel();
    }
    public function datainventaris()
    {
        $npsn = session()->get('npsn');
        $datainventaris = $this->inventarisModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Data Inventaris',
            'datainventaris' => $datainventaris,
            'isi' => 'master/data-inventaris/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = $this->barangModel->findAll();
        $data = array(
            'titlebar' => 'Data Inventaris',
            'title' => 'Tambah Data Inventaris',
            'isi' => 'master/data-inventaris/add',
            'inventaris' => $data,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'inventaris' => [
                'rules' => 'required|alpha_space|is_unique[mod_inventaris.inventaris]',
                'errors' => [
                    'required' => 'Jenis Inventaris tidak boleh kosong.',
                    'alpha_space' => 'Jenis Inventaris harus huruf dan spasi.',
                    'is_unique' => 'Inventaris sudah ada.'
                ]
            ],
            'dibutuhkan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Dibutuhkan tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Dibutuhkan harus angka.',
                ]
            ],
            'ada' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Ada tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Ada harus angka.',
                ]
            ],
            'kurang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kurang tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kurang harus angka.',
                ]
            ],
            'lebih' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Lebih tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Lebih harus angka.',
                ]
            ],
        ])) {
            return redirect()->to('/data-inventaris/add')->withInput();
        }
        $data = [
            'inventaris'          => $this->request->getPost('inventaris'),
            'dibutuhkan'          => $this->request->getPost('dibutuhkan'),
            'ada'                 => $this->request->getPost('ada'),
            'kurang'              => $this->request->getPost('kurang'),
            'lebih'               => $this->request->getPost('lebih'),
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->inventarisModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-inventaris'));
    }

    public function delete($id)
    {
        $this->inventarisModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-inventaris'));
    }

    public function edit($id)
    {
        $data = $this->barangModel->findAll();
        $ids = session()->get('id_sekolah');
        $data = array(
            'titlebar' => 'Data Inventaris',
            'title' => 'Edit Data Inventaris',
            'isi' => 'master/data-inventaris/edit',
            'inventaris' => $data,
            'validation' => \Config\Services::validation(),
            'data' => $this->inventarisModel->where('id', $id)->where('id_sekolah', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $inventarisLama = $this->inventarisModel->where(['id' => $id])->first();
        if ($inventarisLama['inventaris'] == $this->request->getPost('inventaris')) {
            $rule_inventaris = 'required';
        } else {
            $rule_inventaris = 'required|numeric|is_unique[mod_inventaris.inventaris]';
        }
        //Validasi input
        if (!$this->validate([
            'inventaris' => [
                'rules' => $rule_inventaris,
                'errors' => [
                    'required' => 'Jenis Inventaris tidak boleh kosong.',
                    'alpha_space' => 'Jenis Inventaris harus huruf dan spasi.'
                ]
            ],
            'dibutuhkan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Dibutuhkan tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Dibutuhkan harus angka.',
                ]
            ],
            'ada' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Ada tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Ada harus angka.',
                ]
            ],
            'kurang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kurang tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kurang harus angka.',
                ]
            ],
            'lebih' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Lebih tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Lebih harus angka.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-inventaris/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'inventaris'          => $this->request->getPost('inventaris'),
            'dibutuhkan'          => $this->request->getPost('dibutuhkan'),
            'ada'                 => $this->request->getPost('ada'),
            'kurang'              => $this->request->getPost('kurang'),
            'lebih'               => $this->request->getPost('lebih'),
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->inventarisModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-inventaris'));
    }
}
