<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\BangunanModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\PegawaiModel;
use App\Models\BukuIndukModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;


class Profil extends BaseController
{
    protected $profilModel;
    protected $bangunanlModel;
    protected $kecamatanlModel;
    protected $siswaModel;
    protected $guruModel;
    protected $pegawaiModel;
    protected $alumniModel;
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->bangunanModel = new BangunanModel();
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->siswaModel = new SiswaModel();
        $this->guruModel = new GuruModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->alumniModel = new BukuIndukModel();
    }
    public function profil()
    {
        $npsn = session()->get('npsn');
        $dataprofil = $this->profilModel->where('npsn =', $npsn)->first();
        $data = array(
            'titlebar' => 'Profil Sekolah',
            'title' => 'Profil Sekolah',
            'data' => $dataprofil,
            'isi' => 'master/profil/data',
            'siswa'    => $this->siswaModel->where('npsn', $npsn)->countAllResults(),
            'guru'    => $this->guruModel->where('npsn', $npsn)->countAllResults(),
            'pegawai'    => $this->pegawaiModel->where('npsn', $npsn)->countAllResults(),
            'alumni'    => $this->alumniModel->where('npsn', $npsn)->countAllResults(),
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $kec = $this->kecamatanModel->findAll();
        $kab = $this->kabupatenModel->findAll();
        $data = array(
            'titlebar' => 'Profil Sekolah',
            'title' => 'Profil Sekolah',
            'isi' => 'master/profil/add',
            'validation' => \Config\Services::validation(),
            'kecamatan' => $kec,
            'kabupaten' => $kab
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'nss' => [
                'rules' => 'required|numeric|max_length[12]|is_unique[mod_profil.nss]',
                'errors' => [
                    'required' => 'NSS tidak boleh kosong. Jika tidak ada isi angka 0',
                    'numeric' => 'NSS harus angka.',
                    'max_length' => 'NSS maksimal 12 digit.',
                    'is_unique' => 'NSS sudah terdaftar.'
                ]
            ],
            'nds' => [
                'rules' => 'required|numeric|max_length[8]|is_unique[mod_profil.nds]',
                'errors' => [
                    'required' => 'NDS tidak boleh kosong. Jika tidak ada isi angka 0',
                    'numeric' => 'NDS harus angka.',
                    'max_length' => 'NDS maksimal 8 digit.',
                    'is_unique' => 'NDS sudah terdaftar.'
                ]
            ],
            'akreditas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Akreditas ahrus dipilih.',
                ]
            ],
            'nosiop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SIOP tidak boleh kosong.',
                ]
            ],
            'thnberdiri' => [
                'rules' => 'required|numeric|max_length[4]',
                'errors' => [
                    'required' => 'Tahun Berdiri tidak boleh kosong.',
                    'numeric' => 'Tahun Berdiri harus angka.',
                    'max_length' => 'Tahun Berdiri maksimal 4 digit.',
                ]
            ],
            'nosk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SK tidak boleh kosong.',
                ]
            ],
            'tglsk' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal SK tidak boleh kosong.',
                    'valid_date' => 'Tanggal SK tidak valid.',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Sekolah harus di pilih.',
                ]
            ],
            'standar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Standar Sekolah Bertaraf harus di pilih.',
                ]
            ],
            'waktub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Belajar harus di pilih.',
                ]
            ],
            'kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kabupaten harus di pilih.',
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan harus di pilih.',
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                ]
            ],
            'kdpos' => [
                'rules' => 'required|numeric|max_length[5]',
                'errors' => [
                    'required' => 'Kode Pos harus di pilih.',
                    'max_length' => 'Kode Pos maksimal 5 digit.',
                    'numeric' => 'Kode Pos harus angka.',
                ]
            ],
            'telp' => [
                'rules' => 'required|max_length[12]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maksimal 12 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'kepsek' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Nama Kepala Sekolah tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Nama Kepala Sekolah berisi karakter yang tidak didukung.'
                ]
            ],
            'nip' => [
                'rules' => 'required|numeric|max_length[18]|is_unique[mod_profil.nip]',
                'errors' => [
                    'required' => 'NIP tidak boleh kosong. Jika tidak ada isi angka 0',
                    'numeric' => 'NIP harus angka.',
                    'max_length' => 'NIP maksimal 18 digit.',
                    'is_unique' => 'NIP sudah ada.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[mod_user.email]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ]
            ],
            'web' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat website tidak boleh kosong.',
                ]
            ],
            // 'web' => [
            //     'rules' => 'required|valid_url',
            //     'errors' => [
            //         'required' => 'Alamat website tidak boleh kosong.',
            //         'valid_url' => 'Alamat website tidak valid.',
            //     ]
            // ],
            // 'lg' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Longitude tidak boleh kosong.',
            //     ]
            // ],
            // 'lt' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Latidude tidak boleh kosong.',
            //     ]
            // ],
        ])) {
            //     $validation = \Config\Services::validation();
            //     return redirect()->to('/profil-sekolah/add')->withInput()->with('validation', $validation);
            return redirect()->to('/profil-sekolah/add')->withInput();
        }
        $foto   = $this->request->getFile('foto');
        $fotoks   = $this->request->getFile('fotoks');
        if ($foto->getError() == 4) {
            $fileName = "blank.png";
        } else {
            $fileName = $foto->getRandomName();
            //move foto
            $foto->move(ROOTPATH . 'public/media/profil/', $fileName);
        }
        if ($fotoks->getError() == 4) {
            $fileNameks = "blank.png";
        } else {
            $fileNameks = $fotoks->getRandomName();
            //move foto
            $fotoks->move(ROOTPATH . 'public/media/kepsek/', $fileNameks);
        }
        $data = [
            'id_sekolah'          => session()->get('id_sekolah'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nss'                 => $this->request->getPost('nss'),
            'nds'                 => $this->request->getPost('nds'),
            'nosiop'              => $this->request->getPost('nosiop'),
            'akreditas'           => $this->request->getPost('akreditas'),
            'thnberdiri'          => $this->request->getPost('thnberdiri'),
            'nosk'                => $this->request->getPost('nosk'),
            'tglsk'               => $this->request->getPost('tglsk'),
            'status'              => $this->request->getPost('status'),
            'standar'             => $this->request->getPost('standar'),
            'waktub'              => $this->request->getPost('waktub'),
            'kabupaten'           => $this->request->getPost('kabupaten'),
            'kecamatan'           => $this->request->getPost('kecamatan'),
            'alamat'              => $this->request->getPost('alamat'),
            'kodepos'             => $this->request->getPost('kdpos'),
            'telepon'             => $this->request->getPost('telp'),
            'nama_kepsek'         => $this->request->getPost('kepsek'),
            'nip'                 => $this->request->getPost('nip'),
            'email'               => $this->request->getPost('email'),
            'jenjang'             => session()->get('jenjang'),
            'website'             => $this->request->getPost('web'),
            'namayys'             => $this->request->getPost('namayys'),
            'alamatyys'           => $this->request->getPost('alamatyys'),
            // 'longitude'           => $this->request->getPost('lg'),
            // 'latitude'            => $this->request->getPost('lt'),
            'gmap'                => $this->request->getPost('gmap'),
            'profil'              => $fileName,
            'foto'                => $fileNameks,
            'userentry'           => session()->get('nama'),
        ];
        $this->profilModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('profil-sekolah'));
    }
    public function edit($id)
    {
        $ids = session()->get('id_sekolah');
        $kec = $this->kecamatanModel->findAll();
        $kab = $this->kabupatenModel->findAll();
        $data = array(
            'titlebar' => 'Profil Sekolah',
            'title' => 'Edit Data Sekolah',
            'isi' => 'master/profil/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->profilModel->where('id', $id)->where('id_sekolah', $ids)->first(),
            'kecamatan' => $kec,
            'kabupaten' => $kab
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $nipLama = $this->profilModel->where(['id' => $id])->first();
        if ($nipLama['nip'] == $this->request->getPost('nip')) {
            $rule_nip = 'required|numeric|max_length[18]';
        } else {
            $rule_nip = 'required|numeric|max_length[18]|is_unique[mod_profil.nip]';
        }
        $nssLama = $this->profilModel->where(['id' => $id])->first();
        if ($nssLama['nss'] == $this->request->getPost('nss')) {
            $rule_nss = 'required|numeric|max_length[12]';
        } else {
            $rule_nss = 'required|numeric|max_length[12]|is_unique[mod_profil.nss]';
        }
        $ndsLama = $this->profilModel->where(['id' => $id])->first();
        if ($ndsLama['nds'] == $this->request->getPost('nds')) {
            $rule_nds = 'required|numeric|max_length[8]';
        } else {
            $rule_nds = 'required|numeric|max_length[8]|is_unique[mod_profil.nds]';
        }
        //Validasi input
        if (!$this->validate([
            'nss' => [
                'rules' => $rule_nss,
                'errors' => [
                    'required' => 'NSS tidak boleh kosong. Jika tidak ada isi angka 0',
                    'numeric' => 'NSS harus angka.',
                    'max_length' => 'NSS maksimal 12 digit.',
                    'is_unique' => 'NSS sudah terdaftar.'
                ]
            ],
            'nds' => [
                'rules' => $rule_nds,
                'errors' => [
                    'required' => 'NDS tidak boleh kosong. Jika tidak ada isi angka 0',
                    'numeric' => 'NDS harus angka.',
                    'max_length' => 'NDS maksimal 8 digit.',
                    'is_unique' => 'NDS sudah terdaftar.'
                ]
            ],
            'akreditas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Akreditas ahrus dipilih.',
                ]
            ],
            'nosiop' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SIOP tidak boleh kosong.',
                ]
            ],
            'thnberdiri' => [
                'rules' => 'required|numeric|max_length[4]',
                'errors' => [
                    'required' => 'Tahun Berdiri tidak boleh kosong.',
                    'numeric' => 'Tahun Berdiri harus angka.',
                    'max_length' => 'Tahun Berdiri maksimal 4 digit.',
                ]
            ],
            'nosk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SK tidak boleh kosong.',
                ]
            ],
            'tglsk' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal SK tidak boleh kosong.',
                    'valid_date' => 'Tanggal SK tidak valid.',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Sekolah harus di pilih.',
                ]
            ],
            'standar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Standar Sekolah Bertaraf harus di pilih.',
                ]
            ],
            'waktub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Belajar harus di pilih.',
                ]
            ],
            'kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kabupaten harus di pilih.',
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan harus di pilih.',
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                ]
            ],
            'kdpos' => [
                'rules' => 'required|numeric|max_length[5]',
                'errors' => [
                    'required' => 'Kode Pos harus di pilih.',
                    'max_length' => 'Kode Pos maksimal 5 digit.',
                    'numeric' => 'Kode Pos harus angka.',
                ]
            ],
            'telp' => [
                'rules' => 'required|max_length[12]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maksimal 12 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'kepsek' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Nama Kepala Sekolah tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Nama Kepala Sekolah berisi karakter yang tidak didukung.'
                ]
            ],
            'nip' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => 'NIP tidak boleh kosong. Jika tidak ada isi angka 0',
                    'numeric' => 'NIP harus angka.',
                    'max_length' => 'NIP maksimal 18 digit.',
                    'is_unique' => 'NIP sudah ada.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[mod_user.email]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ]
            ],
            'web' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat website tidak boleh kosong.',
                ]
            ],
            // 'web' => [
            //     'rules' => 'required|valid_url',
            //     'errors' => [
            //         'required' => 'Alamat website tidak boleh kosong.',
            //         'valid_url' => 'Alamat website tidak valid.',
            //     ]
            // ],
            // 'lg' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Longitude tidak boleh kosong.',
            //     ]
            // ],
            // 'lt' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Latidude tidak boleh kosong.',
            //     ]
            // ],
        ])) {
            //     $validation = \Config\Services::validation();
            //     return redirect()->to('/profil-sekolah/add')->withInput()->with('validation', $validation);
            return redirect()->to(base_url('profil-sekolah/edit/' . $this->request->getPost('id')))->withInput();
        }

        $profil   = $this->request->getFile('foto');
        if ($profil->getError() == 4) {
            $data = $this->profilModel->find($id);
            $fileName = $data['profil'];
        } else {
            $fileName = $profil->getRandomName();
            //move foto
            $profil->move(ROOTPATH . 'public/media/profil/', $fileName);
            $data = $this->profilModel->find($id);
            $replace = $data['profil'];
            if (file_exists(ROOTPATH . 'public/media/profil/' . $replace)) {
                if ($data['profil'] != 'blank.png') {
                    unlink(ROOTPATH . 'public/media/profil/' . $replace);
                }
            }
        }
        $fotoks   = $this->request->getFile('fotoks');
        if ($fotoks->getError() == 4) {
            $dataks = $this->profilModel->find($id);
            $fileNameks = $dataks['foto'];
        } else {
            $fileNameks = $fotoks->getRandomName();
            //move foto
            $fotoks->move(ROOTPATH . 'public/media/kepsek/', $fileNameks);
            $dataks = $this->profilModel->find($id);
            $replaceks = $dataks['foto'];
            if (file_exists(ROOTPATH . 'public/media/kepsek/' . $replaceks)) {
                if ($dataks['foto'] != 'blank.png') {
                    unlink(ROOTPATH . 'public/media/kepsek/' . $replaceks);
                }
            }
        }
        $data = [
            'id'                  => $id,
            'id_sekolah'          => session()->get('id_sekolah'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nss'                 => $this->request->getPost('nss'),
            'nds'                 => $this->request->getPost('nds'),
            'nosiop'              => $this->request->getPost('nosiop'),
            'akreditas'           => $this->request->getPost('akreditas'),
            'thnberdiri'          => $this->request->getPost('thnberdiri'),
            'nosk'                => $this->request->getPost('nosk'),
            'tglsk'               => $this->request->getPost('tglsk'),
            'status'              => $this->request->getPost('status'),
            'standar'             => $this->request->getPost('standar'),
            'waktub'              => $this->request->getPost('waktub'),
            'kabupaten'           => $this->request->getPost('kabupaten'),
            'kecamatan'           => $this->request->getPost('kecamatan'),
            'alamat'              => $this->request->getPost('alamat'),
            'kodepos'             => $this->request->getPost('kdpos'),
            'telepon'             => $this->request->getPost('telp'),
            'nama_kepsek'         => $this->request->getPost('kepsek'),
            'nip'                 => $this->request->getPost('nip'),
            'email'               => $this->request->getPost('email'),
            'jenjang'             => session()->get('jenjang'),
            'website'             => $this->request->getPost('web'),
            'namayys'             => $this->request->getPost('namayys'),
            'alamatyys'           => $this->request->getPost('alamatyys'),
            // 'longitude'           => $this->request->getPost('lg'),
            // 'latitude'            => $this->request->getPost('lt'),
            'gmap'                => $this->request->getPost('gmap'),
            'profil'              => $fileName,
            'foto'                => $fileNameks,
            'userentry'           => session()->get('nama'),
        ];
        $this->profilModel->save($data);
        session()->setFlashdata('m', 'Diedit');
        return redirect()->to(base_url('profil-sekolah'));
    }
    public function bangunan()
    {
        $id = session()->get('id_sekolah');
        $databangunan = $this->profilModel->join('mod_bangunan', 'mod_bangunan.id_sekolah = mod_profil.id_sekolah', 'right')->where('mod_bangunan.id_sekolah =', $id)->first();
        $data = array(
            'titlebar' => 'Bangunan Sekolah',
            'title' => 'Bangunan Sekolah',
            'data' => $databangunan,
            'isi' => 'master/profil/bangunan'
        );
        return view('layout/wrapper', $data);
    }
    public function addbangunan()
    {
        $data = array(
            'titlebar' => 'Bangunan Sekolah',
            'title' => 'Bangunan Sekolah',
            'isi' => 'master/profil/addbangunan',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function savebangunan()
    {
        //Validasi input
        if (!$this->validate([
            'lttanah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Luas Tanah tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Luas Tanah harus angka.',
                ]
            ],
            'ltbangunan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Luas Bangunan tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Luas Bangunan harus angka.',
                ]
            ],
            'ltrencana' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Luas Rencana Pembangunan tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Luas Rencana Pembangunan harus angka.',
                ]
            ],
            'ststanah' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Status Tanah tidak boleh kosong.',
                    'alpha_space' => 'Status Tanah harus huruf dan spasi.'
                ]
            ],
            'stsgedung' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Status Gedung tidak boleh kosong.',
                    'alpha_space' => 'Status Gedung harus huruf dan spasi.'
                ]
            ],
            'jkelasxmipa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas X MIPA tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas X MIPA harus angka.',
                ]
            ],
            'jkelasxiis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas X IIS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas X IIS harus angka.',
                ]
            ],
            'jkelasxbhs' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas X BHS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas X BHS harus angka.',
                ]
            ],
            'jkelasximipa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XI MIPA tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XI MIPA harus angka.',
                ]
            ],
            'jkelasxiiis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XI IIS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XI IIS harus angka.',
                ]
            ],
            'jkelasxibhs' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XI BHS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XI BHS harus angka.',
                ]
            ],
            'jkelasxiimipa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XII MIPA tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XII MIPA harus angka.',
                ]
            ],
            'jkelasxiiiis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XII IIS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XII IIS harus angka.',
                ]
            ],
            'jkelasxiibhs' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XII BHS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XII BHS harus angka.',
                ]
            ],
        ])) {
            //     $validation = \Config\Services::validation();
            //     return redirect()->to('/profil-sekolah/add')->withInput()->with('validation', $validation);
            return redirect()->to('/profil-sekolah/bangunan/add')->withInput();
        }
        $data = [
            'id_sekolah'          => session()->get('id_sekolah'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'npsn'                => session()->get('npsn'),
            'luas_tanah'          => $this->request->getPost('lttanah'),
            'luas_bangunan'       => $this->request->getPost('ltbangunan'),
            'luas_rpembangunan'   => $this->request->getPost('ltrencana'),
            'status_tanah'        => $this->request->getPost('ststanah'),
            'status_gedung'       => $this->request->getPost('stsgedung'),
            'jkelasx_mipa'         => $this->request->getPost('jkelasxmipa'),
            'jkelasx_iis'          => $this->request->getPost('jkelasxiis'),
            'jkelasx_bhs'          => $this->request->getPost('jkelasxbhs'),
            'jkelasxi_mipa'        => $this->request->getPost('jkelasximipa'),
            'jkelasxi_iis'         => $this->request->getPost('jkelasxiiis'),
            'jkelasxi_bhs'         => $this->request->getPost('jkelasxibhs'),
            'jkelasxii_mipa'       => $this->request->getPost('jkelasxiimipa'),
            'jkelasxii_iis'        => $this->request->getPost('jkelasxiiiis'),
            'jkelasxii_bhs'        => $this->request->getPost('jkelasxiibhs'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->bangunanModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('profil-sekolah/bangunan'));
    }
    public function editbangunan($id)
    {
        $ids = session()->get('id_sekolah');
        $data = array(
            'titlebar' => 'Bangunan Sekolah',
            'title' => 'Edit Bangunan Sekolah',
            'isi' => 'master/profil/editbangunan',
            'validation' => \Config\Services::validation(),
            'data' => $this->bangunanModel->where('id', $id)->where('id_sekolah', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function updatebangunan($id)
    {
        //Validasi input
        if (!$this->validate([
            'lttanah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Luas Tanah tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Luas Tanah harus angka.',
                ]
            ],
            'ltbangunan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Luas Bangunan tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Luas Bangunan harus angka.',
                ]
            ],
            'ltrencana' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Luas Rencana Pembangunan tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Luas Rencana Pembangunan harus angka.',
                ]
            ],
            'ststanah' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Status Tanah tidak boleh kosong.',
                    'alpha_space' => 'Status Tanah harus huruf dan spasi.'
                ]
            ],
            'stsgedung' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Status Gedung tidak boleh kosong.',
                    'alpha_space' => 'Status Gedung harus huruf dan spasi.'
                ]
            ],
            'jkelasxmipa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas X MIPA tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas X MIPA harus angka.',
                ]
            ],
            'jkelasxiis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas X IIS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas X IIS harus angka.',
                ]
            ],
            'jkelasxbhs' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas X BHS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas X BHS harus angka.',
                ]
            ],
            'jkelasximipa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XI MIPA tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XI MIPA harus angka.',
                ]
            ],
            'jkelasxiiis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XI IIS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XI IIS harus angka.',
                ]
            ],
            'jkelasxibhs' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XI BHS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XI BHS harus angka.',
                ]
            ],
            'jkelasxiimipa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XII MIPA tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XII MIPA harus angka.',
                ]
            ],
            'jkelasxiiiis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XII IIS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XII IIS harus angka.',
                ]
            ],
            'jkelasxiibhs' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Kelas XII BHS tidak boleh kosong. Jika kosong isi angka 0.',
                    'numeric' => 'Jumlah Kelas XII BHS harus angka.',
                ]
            ],
        ])) {
            //     $validation = \Config\Services::validation();
            //     return redirect()->to('/profil-sekolah/add')->withInput()->with('validation', $validation);
            return redirect()->to(base_url('profil-sekolah/bangunan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'id_sekolah'          => session()->get('id_sekolah'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'npsn'                => session()->get('npsn'),
            'luas_tanah'          => $this->request->getPost('lttanah'),
            'luas_bangunan'       => $this->request->getPost('ltbangunan'),
            'luas_rpembangunan'   => $this->request->getPost('ltrencana'),
            'status_tanah'        => $this->request->getPost('ststanah'),
            'status_gedung'       => $this->request->getPost('stsgedung'),
            'jkelasx_mipa'         => $this->request->getPost('jkelasxmipa'),
            'jkelasx_iis'          => $this->request->getPost('jkelasxiis'),
            'jkelasx_bhs'          => $this->request->getPost('jkelasxbhs'),
            'jkelasxi_mipa'        => $this->request->getPost('jkelasximipa'),
            'jkelasxi_iis'         => $this->request->getPost('jkelasxiiis'),
            'jkelasxi_bhs'         => $this->request->getPost('jkelasxibhs'),
            'jkelasxii_mipa'       => $this->request->getPost('jkelasxiimipa'),
            'jkelasxii_iis'        => $this->request->getPost('jkelasxiiiis'),
            'jkelasxii_bhs'        => $this->request->getPost('jkelasxiibhs'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->bangunanModel->save($data);
        session()->setFlashdata('m', 'Diedit');
        return redirect()->to(base_url('profil-sekolah/bangunan'));
    }
    public function datakab()
    {
        $cari = $this->request->getVar('search');
        $kabupaten =  $this->kabupatenModel->like('kabupaten', $cari)->findAll();
        $data = array();
        foreach ($kabupaten as $r) :
            $data[] = [
                "id" => $r['kode_wilayah'],
                "text" => $r['kabupaten'],
            ];
        endforeach;
        echo json_encode($data);
    }
    public function datakec($kode)
    {
        $query = $this->kecamatanModel->where('kode_kab', $kode)->get();
        $data = "<option value=''>.::Pilih Kecamatan::.</option>";
        foreach ($query->getResultArray() as $key => $value) {
            $data .= "<option value='" . $value['kecamatan']  . "'>" . $value['kecamatan'] . "</option>";
        }
        echo $data;
    }
}
