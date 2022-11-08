<?php

namespace App\Controllers;

use App\Models\ArsipLaporanModel;
use CodeIgniter\Config\Config;

class DataArsipLaporan extends BaseController
{
    protected $arsipLModel;
    public function __construct()
    {
        $this->arsipLModel = new ArsipLaporanModel();
    }
    //Arsip Cabdis
    public function arsiplaporan()
    {
        $dataarsip = $this->arsipLModel->findAll();
        $data = array(
            'title' => 'Arsip Laporan Bulanan',
            'data' => $dataarsip,
            'isi' => 'master/data-arsip-laporan/data'
        );

        return view('layout/wrapper', $data);
    }
    public function labul()
    {
        $bulan = $this->request->getPost('blnfilter');
        $tahun = $this->request->getPost('thnfilter');
        if ($bulan || $tahun == true) {
            $jenjang = session()->get('jenjang');
            $datasekolah = $this->sekolahModel->where('jenjang', $jenjang)->findAll();
            $datalabul = $this->arsipLModel->where('jenjang =', $jenjang)->where('bulan =', $bulan)->where('tahun =', $tahun)->findAll();
        } else {
            $jenjang = session()->get('jenjang');
            $datasekolah = $this->sekolahModel->where('jenjang =', $jenjang)->findAll();
            $bulan_ini = format_bulan(date('Y-m-d'));
            $datalabul = $this->arsipLModel->where('jenjang =', $jenjang)->where('bulan =', $bulan_ini)->findAll();
        }
        $data = array(
            'title' => 'Laporan Bulanan Sekolah',
            'sekolah' => $datasekolah,
            'labul' => $datalabul,
            'isi' => 'master/data-arsip-laporan/labul'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Arsip Laporan Bulanan',
            'title' => 'Tambah Arsip',
            'isi' => 'master/data-arsip-laporan/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Judul Laporan tidak boleh kosong.',
                    'alpha_space' => 'Judul Laporan harus huruf dan spasi.'
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
            return redirect()->to('/data-arsip-laporan/add')->withInput();
        }
        //cek file arsip dulu
        $valid = $this->request->getPost('valid');
        $cek = $this->arsipLModel->arsip($valid);
        if (!empty($cek) && is_array($cek)) {
            if ($valid == $cek['validfile']) {
                //jika data valid cocok
                session()->setFlashdata('m', 'Maaf, Bulan ini sudah menginput arsip laporan bulanan' . "\n" . ' Mohon input kembali bulan depan atau hapus/edit laporan sebelumnya.');
                return redirect()->to(base_url('data-arsip-laporan/add'));
            } else {
                $arsip   = $this->request->getFile('file');
                $fileName = $arsip->getRandomName();
                //move file
                $arsip->move(ROOTPATH . 'public/media/arsip-laporan/', $fileName);
                $data = [
                    'judul'               => $this->request->getPost('judul'),
                    'bulan'               => $this->request->getPost('bulan'),
                    'tahun'               => $this->request->getPost('tahun'),
                    'validfile'           => $this->request->getPost('valid'),
                    'file'                => $fileName,
                    'id_instansi'         => session()->get('id_sekolah'),
                    'npsn'                => session()->get('npsn'),
                    'nama_instansi'       => session()->get('nama_sekolah'),
                    'userentry'           => session()->get('nama'),
                ];
                $this->arsipLModel->save($data);
                session()->setFlashdata('m', 'Ditambahkan');
                return redirect()->to(base_url('data-arsip-laporan'));
            }
        } else {
            $arsip   = $this->request->getFile('file');
            $fileName = $arsip->getRandomName();
            //move file
            $arsip->move(ROOTPATH . 'public/media/arsip-laporan/', $fileName);
            $data = [
                'judul'               => $this->request->getPost('judul'),
                'bulan'               => $this->request->getPost('bulan'),
                'tahun'               => $this->request->getPost('tahun'),
                'validfile'           => $this->request->getPost('valid'),
                'file'                => $fileName,
                'id_instansi'         => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_instansi'       => session()->get('nama_sekolah'),
                'userentry'           => session()->get('nama'),
            ];
            $this->arsipLModel->save($data);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-arsip-laporan'));
        }
    }
    public function delete($id)
    {
        $data = $this->arsipLModel->find($id);
        $file = $data['file'];
        if (file_exists(ROOTPATH . 'public/media/arsip-laporan/' . $file)) {
            unlink(ROOTPATH . 'public/media/arsip-laporan/' . $file);
        }
        $this->arsipLModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-arsip-laporan'));
    }
    public function edit($id)
    {
        $ids = session()->get('id_sekolah');
        $data = array(
            'titlebar' => 'Arsip Laporan Bulanan',
            'title' => 'Edit Arsip',
            'isi' => 'master/data-arsip-laporan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->arsipLModel->where('id', $id)->where('id_instansi', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Judul Laporan tidak boleh kosong.',
                    'alpha_space' => 'Judul Laporan harus huruf dan spasi.'
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
            return redirect()->to(base_url('/data-arsip-laporan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $file   = $this->request->getFile('file');
        if ($file->getError() == 4) {
            $r = $this->arsipLModel->find($id);
            $fileName = $r['file'];
        } else {
            $fileName = $file->getRandomName();
            //move file
            $file->move(ROOTPATH . 'public/media/arsip-laporan/', $fileName);
            $r = $this->arsipLModel->find($id);
            $replace = $r['file'];
            if (file_exists(ROOTPATH . 'public/media/arsip-laporan/' . $replace)) {
                unlink(ROOTPATH . 'public/media/arsip-laporan/' . $replace);
            }
        }
        $data = [
            'id'                  => $id,
            'judul'               => $this->request->getPost('judul'),
            'bulan'               => $this->request->getPost('bulan'),
            'tahun'               => $this->request->getPost('tahun'),
            'file'                => $fileName,
        ];
        $this->arsipLModel->save($data);
        session()->setFlashdata('m', 'Diedit');
        return redirect()->to(base_url('data-arsip-laporan'));
    }
    public function filter()
    {
        $bulan = $this->request->getPost('blnfilter');
        $tahun = $this->request->getPost('thnfilter');

        $filterarsip = $this->arsipLModel->filterdata($bulan, $tahun);
        $data = array(
            'title' => 'Arsip Laporan Bulanan',
            'arsip' => $filterarsip,
            'isi' => 'master/data-arsip-laporan/data'
        );

        return view('layout/wrapper', $data);
    }
}
