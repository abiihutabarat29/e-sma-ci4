<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\SekolahModel;
use CodeIgniter\Config\Config;

class DataArsip extends BaseController
{
    protected $arsipModel;
    protected $sekolahModel;
    public function __construct()
    {
        $this->arsipModel = new ArsipModel();
        $this->sekolahModel = new SekolahModel();
    }
    public function dataarsip()
    {
        $npsn = session()->get('npsn');
        $dataarsip = $this->arsipModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Arsip Laporan Bulanan',
            'data' => $dataarsip,
            'isi' => 'master/data-arsip/data'
        );

        return view('layout/wrapper', $data);
    }
    public function labul()
    {
        $bulan = $this->request->getPost('blnfilter');
        $tahun = $this->request->getPost('thnfilter');
        if ($bulan || $tahun == true) {
            $jenjang = session()->get('jenjang');
            $datasekolah = $this->sekolahModel->join('mod_labul', 'mod_labul.id_sekolah = mod_sekolah.id', 'left')->where('mod_sekolah.jenjang', $jenjang)->where('mod_labul.bulan', $bulan)->where('mod_labul.tahun', $tahun)->findAll();
        } else {
            $jenjang = session()->get('jenjang');
            $datasekolah = $this->sekolahModel->where('mod_sekolah.jenjang', $jenjang)->join('mod_labul', 'mod_labul.id_sekolah = mod_sekolah.id', 'left')->findAll();
        }
        // dd($datasekolah);
        $data = array(
            'title' => 'Laporan Bulanan Sekolah',
            'sekolah' => $datasekolah,
            'isi' => 'master/data-arsip/labul'
        );

        return view('layout/wrapper', $data);
    }
    // public function labulfilter()
    // {
    //     $jenjang = session()->get('jenjang');
    //     $bulan = $this->request->getPost('blnfilter');
    //     $tahun = $this->request->getPost('thnfilter');
    //     // $dataarsip = $this->arsipModel->filterdata($bulan, $tahun);
    //     $datasekolah = $this->sekolahModel->join('mod_labul', 'mod_labul.id_sekolah = mod_sekolah.id', 'left')->where('mod_sekolah.jenjang', $jenjang)->where('mod_labul.bulan', $bulan)->where('mod_labul.tahun', $tahun)->findAll();
    //     // dd($datasekolah);
    //     $data = array(
    //         'title' => 'Laporan Bulanan Sekolah',
    //         'sekolah' => $datasekolah,
    //         'isi' => 'master/data-arsip/labul'
    //     );

    //     return view('layout/wrapper', $data);
    // }
    public function add()
    {
        $data = array(
            'titlebar' => 'Arsip Laporan Bulanan',
            'title' => 'Form Tambah Arsip Laporan Bulanan',
            'isi' => 'master/data-arsip/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'nmlabul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Labul tidak boleh kosong.',
                    'alpha_space' => 'Nama Labul harus huruf dan spasi.'
                ]
            ],
            'bulan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus di pilih.',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus di pilih.',
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|mime_in[file,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel]|max_size[file,2048]',
                'errors' => [
                    'uploaded' => 'File harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan *excel, *xls, *xlsx',
                    'max_size' => 'Ukuran File maksimal 2MB.'
                ]
            ],
        ])) {
            //     $validation = \Config\Services::validation();
            //     return redirect()->to('/arsip/add')->withInput()->with('validation', $validation);
            return redirect()->to('/data-arsip/add')->withInput();
        }
        //cek file arsip dulu
        $valid = $this->request->getPost('valid');
        $cek = $this->arsipModel->arsip($valid);
        if (!empty($cek) && is_array($cek)) {
            if ($valid == $cek['validfile']) {
                //jika data valid cocok
                session()->setFlashdata('m', 'Maaf, Bulan ini sudah menginput arsip laporan bulanan, input kembali bulan depan, atau hapus file sebelumnya.');
                return redirect()->to(base_url('data-arsip/add'));
            } else {
                $arsip   = $this->request->getFile('file');
                $fileName = $arsip->getRandomName();
                //move file
                $arsip->move(ROOTPATH . 'public/media/arsip/', $fileName);
                $data = [
                    'nama_labul'          => $this->request->getPost('nmlabul'),
                    'bulan'               => $this->request->getPost('bulan'),
                    'tahun'               => $this->request->getPost('tahun'),
                    'validfile'           => $this->request->getPost('valid'),
                    'file_labul'          => $fileName,
                    'id_sekolah'          => session()->get('id_sekolah'),
                    'npsn'                => session()->get('npsn'),
                    'nama_sekolah'        => session()->get('nama_sekolah'),
                    'jenjang'             => session()->get('jenjang'),
                    'userentry'           => session()->get('nama'),
                ];
                $this->arsipModel->save($data);
                session()->setFlashdata('m', 'Ditambahkan');
                return redirect()->to(base_url('data-arsip'));
            }
        } else {
            $arsip   = $this->request->getFile('file');
            $fileName = $arsip->getRandomName();
            //move file
            $arsip->move(ROOTPATH . 'public/media/arsip/', $fileName);
            $data = [
                'nama_labul'          => $this->request->getPost('nmlabul'),
                'bulan'               => $this->request->getPost('bulan'),
                'tahun'               => $this->request->getPost('tahun'),
                'validfile'           => $this->request->getPost('valid'),
                'file_labul'          => $fileName,
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->arsipModel->save($data);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-arsip'));
        }
    }
    public function delete($id)
    {
        $data = $this->arsipModel->find($id);
        $file = $data['file_labul'];
        if (file_exists(ROOTPATH . 'public/media/arsip/' . $file)) {
            unlink(ROOTPATH . 'public/media/arsip/' . $file);
        }
        $this->arsipModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-arsip'));
    }
    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Arsip Laporan Bulanan',
            'title' => 'Form Edit Arsip Laporan Bulanan',
            'isi' => 'master/data-arsip/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->arsipModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'nmlabul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Labul tidak boleh kosong.',
                    'alpha_space' => 'Nama Labul harus huruf dan spasi.'
                ]
            ],
            'bulan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan harus di pilih.',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus di pilih.',
                ]
            ],
            'file' => [
                'rules' => 'mime_in[file,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel]|max_size[file,2048]',
                'errors' => [
                    'mime_in' => 'Extension file yang diperbolehkan *excel, *xls, *xlsx',
                    'max_size' => 'Ukuran File maksimal 2MB.'
                ]
            ],
        ])) {
            //     return redirect()->to('/arsip/add')->withInput()->with('validation', $validation);
            return redirect()->to(base_url('/data-arsip/edit/' . $this->request->getPost('id')))->withInput();
        }
        $file   = $this->request->getFile('file');
        if ($file->getError() == 4) {
            $r = $this->arsipModel->find($id);
            $fileName = $r['file_labul'];
        } else {
            $fileName = $file->getRandomName();
            //move foto
            $file->move(ROOTPATH . 'public/media/arsip/', $fileName);
            $r = $this->arsipModel->find($id);
            $replace = $r['file_labul'];
            if (file_exists(ROOTPATH . 'public/media/arsip/' . $replace)) {
                unlink(ROOTPATH . 'public/media/arsip/' . $replace);
            }
        }
        $data = [
            'id'                  => $id,
            'nama_labul'          => $this->request->getPost('nmlabul'),
            'bulan'               => $this->request->getPost('bulan'),
            'tahun'               => $this->request->getPost('tahun'),
            'file_labul'          => $fileName,
        ];
        $this->arsipModel->save($data);
        session()->setFlashdata('m', 'Diedit');
        return redirect()->to(base_url('data-arsip'));
    }
    public function filter()
    {
        $bulan = $this->request->getPost('blnfilter');
        $tahun = $this->request->getPost('thnfilter');

        $filterarsip = $this->arsipModel->filterdata($bulan, $tahun);
        $data = array(
            'title' => 'Arsip Laporan Bulanan',
            'arsip' => $filterarsip,
            'isi' => 'master/data-arsip/data'
        );

        return view('layout/wrapper', $data);
    }
}
