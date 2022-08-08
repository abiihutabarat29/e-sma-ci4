<?php

namespace App\Controllers;

use App\Models\KebutuhanModel;
use App\Models\MapelModel;
use CodeIgniter\Config\Config;

class DataKebutuhan extends BaseController
{
    protected $kebutuhanModel;
    protected $mapelModel;
    public function __construct()
    {
        $this->kebutuhanModel = new KebutuhanModel();
        $this->mapelModel = new MapelModel();
    }

    //funsgi api
    // public function data()
    // {
    //     $dataguru = $this->kebutuhanModel->findAll();

    //     return $this->respond($dataguru, 200);
    // }

    public function datakebutuhan()
    {
        $npsn = session()->get('npsn');
        $datakebutuhan = $this->kebutuhanModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Data Kebutuhan Guru',
            'datakebutuhan' => $datakebutuhan,
            'isi' => 'master/data-kebutuhan-guru/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $jenjang = session()->get('jenjang');
        $mapel = $this->mapelModel->where('jenjang =', $jenjang)->findAll();
        $data = array(
            'titlebar' => 'Data Kebutuhan Guru',
            'title' => 'Form Tambah Data Kebutuhan Guru',
            'isi' => 'master/data-kebutuhan-guru/add',
            'mapel' => $mapel,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mata Pelajaran harus di pilih.',
                ]
            ],
            'butuh' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Dibutuhkan tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Dibutuhkan harus angka.',
                ]
            ],
            'pns' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah PNS tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah PNS harus angka.',
                ]
            ],
            'nonpns' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Non-PNS tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Non-PNS harus angka.',
                ]
            ],
            'kurang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kekurangan Guru tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kekurangan Guru harus angka.',
                ]
            ],
            'lebih' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelebihan Guru tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kelebihan Guru harus angka.',
                ]
            ],
        ])) {
            return redirect()->to('/data-kebutuhan/add')->withInput();
        }
        $data = [
            'mapel'               => $this->request->getPost('mapel'),
            'dibutuhkan'          => $this->request->getPost('butuh'),
            'pns'                 => $this->request->getPost('pns'),
            'nonpns'              => $this->request->getPost('nonpns'),
            'kurang'              => $this->request->getPost('kurang'),
            'lebih'               => $this->request->getPost('lebih'),
            'keterangan'          => $this->request->getPost('ket'),
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->kebutuhanModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-kebutuhan'));
    }

    public function delete($id)
    {
        $this->kebutuhanModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-kebutuhan'));
    }

    public function edit($id)
    {
        $jenjang = session()->get('jenjang');
        $mapel = $this->mapelModel->where('jenjang =', $jenjang)->findAll();
        $data = array(
            'titlebar' => 'Data Kebutuhan Guru',
            'title' => 'Form Edit Data Kebutuhan Guru',
            'isi' => 'master/data-kebutuhan-guru/edit',
            'validation' => \Config\Services::validation(),
            'mapel' => $mapel,
            'data' => $this->kebutuhanModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mata Pelajaran harus di pilih.',
                ]
            ],
            'butuh' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Dibutuhkan tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Dibutuhkan harus angka.',
                ]
            ],
            'pns' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah PNS tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah PNS harus angka.',
                ]
            ],
            'nonpns' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Non-PNS tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Non-PNS harus angka.',
                ]
            ],
            'kurang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kekurangan Guru tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kekurangan Guru harus angka.',
                ]
            ],
            'lebih' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelebihan Guru tidak boleh kosong. Jika kosong isi angka 0',
                    'numeric' => 'Jumlah Kelebihan Guru harus angka.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-kebutuhan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'mapel'               => $this->request->getPost('mapel'),
            'dibutuhkan'          => $this->request->getPost('butuh'),
            'pns'                 => $this->request->getPost('pns'),
            'nonpns'              => $this->request->getPost('nonpns'),
            'kurang'              => $this->request->getPost('kurang'),
            'lebih'               => $this->request->getPost('lebih'),
            'keterangan'          => $this->request->getPost('ket'),
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->kebutuhanModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-kebutuhan'));
    }
}
