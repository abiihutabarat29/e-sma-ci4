<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\GolonganModel;
use CodeIgniter\Config\Config;

class DataGuru extends BaseController
{
    protected $guruModel;
    protected $mapelModel;
    protected $golonganModel;
    public function __construct()
    {
        $this->guruModel = new GuruModel();
        $this->mapelModel = new MapelModel();
        $this->golonganModel = new GolonganModel();
    }

    //funsgi api
    // public function data()
    // {
    //     $dataguru = $this->guruModel->findAll();

    //     return $this->respond($dataguru, 200);
    // }

    public function dataguru()
    {
        $npsn = session()->get('npsn');
        $dataguru = $this->guruModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Data Guru',
            'dataguru' => $dataguru,
            'isi' => 'master/data-guru/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $jenjang = session()->get('jenjang');
        $mapel = $this->mapelModel->where('jenjang =', $jenjang)->findAll();
        $datagol = $this->golonganModel->findAll();
        $data = array(
            'titlebar' => 'Data Guru',
            'title' => 'Tambah Data Guru',
            'isi' => 'master/data-guru/add',
            'mapel' => $mapel,
            'golongan' => $datagol,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        if (session()->get('level') == '1') {
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => 'required|numeric|max_length[18]|is_unique[mod_guru.nip]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 18 digit.',
                        'is_unique' => 'NIP sudah ada.'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_guru.nik]',
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong.',
                        'numeric' => 'NIK harus angka.',
                        'max_length' => 'NIK maximal 16 digit.',
                        'min_length' => 'NIK minimal 16 digit.',
                        'is_unique' => 'NIK sudah ada.'
                    ]
                ],
                'nuptk' => [
                    'rules' => 'required|numeric|max_length[16]|is_unique[mod_guru.nuptk]',
                    'errors' => [
                        'required' => 'NUPTK tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NUPTK harus angka.',
                        'max_length' => 'NUPTK maximal 16 digit.',
                        'is_unique' => 'NUPTK sudah ada.'
                    ]
                ],
                'nrg' => [
                    'rules' => 'required|numeric|max_length[16]|is_unique[mod_guru.nrg]',
                    'errors' => [
                        'required' => 'NRG tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NRG harus angka.',
                        'max_length' => 'NRG maximal 16 digit.',
                        'is_unique' => 'NRG sudah ada.'
                    ]
                ],
                'nmguru' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Guru tidak boleh kosong.',
                        'alpha_space' => 'Nama Guru harus huruf dan spasi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                    ]
                ],
                'tlahir' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Tempat Lahir tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Tempat Lahir berisi karakter yang tidak didukung.'
                    ]
                ],
                'tgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir tidak boleh kosong.',
                    ]
                ],
                'jenkel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus di pilih.',
                    ]
                ],
                'tingkat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tingkat Pendidikan harus di pilih.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di pilih.',
                    ]
                ],
                'jurusan' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Jurusan tidak boleh kosong.',
                        'alpha_space' => 'Jurusan harus huruf dan spasi.'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kepegawaian harus di pilih.',
                    ]
                ],
                'thnijazah' => [
                    'rules' => 'required|numeric|max_length[4]',
                    'errors' => [
                        'required' => 'Tahun Ijazah tidak boleh kosong.',
                        'numeric' => 'Tahun Ijazah harus angka.',
                        'max_length' => 'Tahun Ijazah maximal 4 digit.',
                    ]
                ],
                'stsserti' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Sertifikasi harus di pilih.',
                    ]
                ],
                'mapel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mata Pelajaran yang Diampu harus di pilih.',
                    ]
                ],
                'tmtguru' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Guru tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'jumlahjam' => [
                    'rules' => 'required|numeric|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Jam tidak boleh kosong.',
                        'numeric' => 'Jumlah Jam harus angka.',
                        'max_length' => 'Jumlah Jam maximal 2 digit.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[mod_siswa.email]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong.',
                        'valid_email' => 'Email tidak valid.',
                        'is_unique' => 'Email sudah terdaftar.',
                    ]
                ],
                'nohp' => [
                    'rules' => 'required|numeric|max_length[12]|min_length[11]',
                    'errors' => [
                        'required' => 'Nomor Handphone tidak boleh kosong.',
                        'numeric' => 'Nomor Handphone harus angka.',
                        'max_length' => 'Nomor Handphone maximal 12 digit.',
                        'min_length' => 'Nomor Handphone minimal 11 digit.',
                    ]
                ]
            ])) {
                //     $validation = \Config\Services::validation();
                //     return redirect()->to('/data-guru/add')->withInput()->with('validation', $validation);
                return redirect()->to('/data-guru/add')->withInput();
            }

            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $fileName = "blank.png";
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotoguru/', $fileName);
            }
            $data = [
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nrg'                 => $this->request->getPost('nrg'),
                'nama'                => $this->request->getPost('nmguru'),
                'alamat'              => $this->request->getPost('alamat'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtguru'             => $this->request->getPost('tmtguru'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'mapel'               => $this->request->getPost('mapel'),
                'jumlah_jam'          => $this->request->getPost('jumlahjam'),
                'sts_serti'           => $this->request->getPost('stsserti'),
                'thnsertifikasi'      => $this->request->getPost('thns'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'nohp'                => $this->request->getPost('nohp'),
                'email'               => $this->request->getPost('email'),
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->guruModel->save($data);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-guru'));
        } elseif (session()->get('level') == '2') {
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => 'required|numeric|max_length[18]|is_unique[mod_guru.nip]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 18 digit.',
                        'is_unique' => 'NIP sudah ada.'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_guru.nik]',
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong.',
                        'numeric' => 'NIK harus angka.',
                        'max_length' => 'NIK maximal 16 digit.',
                        'min_length' => 'NIK minimal 16 digit.',
                        'is_unique' => 'NIK sudah ada.'
                    ]
                ],
                'nuptk' => [
                    'rules' => 'required|numeric|max_length[16]|is_unique[mod_guru.nuptk]',
                    'errors' => [
                        'required' => 'NUPTK tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NUPTK harus angka.',
                        'max_length' => 'NUPTK maximal 16 digit.',
                        'is_unique' => 'NUPTK sudah ada.'
                    ]
                ],
                'nrg' => [
                    'rules' => 'required|numeric|max_length[16]|is_unique[mod_guru.nrg]',
                    'errors' => [
                        'required' => 'NRG tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NRG harus angka.',
                        'max_length' => 'NRG maximal 16 digit.',
                        'is_unique' => 'NRG sudah ada.'
                    ]
                ],
                'nmguru' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Guru tidak boleh kosong.',
                        'alpha_space' => 'Nama Guru harus huruf dan spasi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                    ]
                ],
                'tlahir' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Tempat Lahir tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Tempat Lahir berisi karakter yang tidak didukung.'
                    ]
                ],
                'tgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir tidak boleh kosong.',
                    ]
                ],
                'jenkel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus di pilih.',
                    ]
                ],
                'tingkat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tingkat Pendidikan harus di pilih.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di pilih.',
                    ]
                ],
                'jurusan' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Jurusan tidak boleh kosong.',
                        'alpha_space' => 'Jurusan harus huruf dan spasi.'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kepegawaian harus di pilih.',
                    ]
                ],
                'thnijazah' => [
                    'rules' => 'required|numeric|max_length[4]',
                    'errors' => [
                        'required' => 'Tahun Ijazah tidak boleh kosong.',
                        'numeric' => 'Tahun Ijazah harus angka.',
                        'max_length' => 'Tahun Ijazah maximal 4 digit.',
                    ]
                ],
                'mktahun' => [
                    'rules' => 'required|numeric|max_length[4]',
                    'errors' => [
                        'required' => 'Jumlah Tahun Masa Kerja tidak boleh kosong.',
                        'numeric' => 'Jumlah Tahun Masa Kerja harus angka.',
                        'max_length' => 'Jumlah Tahun Masa Kerja maximal 4 digit.',
                    ]
                ],
                'mkbulan' => [
                    'rules' => 'required|numeric|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Bulan Masa Kerja tidak boleh kosong.',
                        'numeric' => 'Jumlah Bulan Masa Kerja harus angka.',
                        'max_length' => 'Jumlah Bulan Masa Kerja maximal 2 digit.',
                    ]
                ],
                'stsserti' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Sertifikasi harus di pilih.',
                    ]
                ],
                'jabatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jabatan harus di pilih.',
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
                'mapel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mata Pelajaran yang Diampu harus di pilih.',
                    ]
                ],
                'tmtguru' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Guru tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'jumlahjam' => [
                    'rules' => 'required|numeric|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Jam tidak boleh kosong.',
                        'numeric' => 'Jumlah Jam harus angka.',
                        'max_length' => 'Jumlah Jam maximal 2 digit.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[mod_siswa.email]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong.',
                        'valid_email' => 'Email tidak valid.',
                        'is_unique' => 'Email sudah terdaftar.',
                    ]
                ],
                'nohp' => [
                    'rules' => 'required|numeric|max_length[12]|min_length[11]',
                    'errors' => [
                        'required' => 'Nomor Handphone tidak boleh kosong.',
                        'numeric' => 'Nomor Handphone harus angka.',
                        'max_length' => 'Nomor Handphone maximal 12 digit.',
                        'min_length' => 'Nomor Handphone minimal 11 digit.',
                    ]
                ]
            ])) {
                //     $validation = \Config\Services::validation();
                //     return redirect()->to('/data-guru/add')->withInput()->with('validation', $validation);
                return redirect()->to('/data-guru/add')->withInput();
            }

            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $fileName = "blank.png";
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotoguru/', $fileName);
            }
            $data = [
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nrg'                 => $this->request->getPost('nrg'),
                'nama'                => $this->request->getPost('nmguru'),
                'alamat'              => $this->request->getPost('alamat'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'mk_thn'              => $this->request->getPost('mktahun'),
                'mk_bln'              => $this->request->getPost('mkbulan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtguru'             => $this->request->getPost('tmtguru'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'mapel'               => $this->request->getPost('mapel'),
                'jumlah_jam'          => $this->request->getPost('jumlahjam'),
                'sts_serti'           => $this->request->getPost('stsserti'),
                'thnsertifikasi'      => $this->request->getPost('thns'),
                'mapel_serti'         => $this->request->getPost('mapelserti'),
                'tgs_tambah'          => $this->request->getPost('tgstambah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'jabatan'             => $this->request->getPost('jabatan'),
                'no_sk'               => $this->request->getPost('nosk'),
                'tgl_sk'              => $this->request->getPost('tglsk'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'nohp'                => $this->request->getPost('nohp'),
                'email'               => $this->request->getPost('email'),
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->guruModel->save($data);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-guru'));
        }
    }
    public function delete($id)
    {
        $data = $this->guruModel->find($id);
        $foto = $data['foto'];
        if (file_exists(ROOTPATH . 'public/media/fotoguru/' . $foto)) {
            if ($data['foto'] != 'blank.png') {
                unlink(ROOTPATH . 'public/media/fotoguru/' . $foto);
            }
        }
        $this->guruModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-guru'));
    }
    public function edit($id)
    {
        $ids = session()->get('id_sekolah');
        $datagol = $this->golonganModel->findAll();
        $jenjang = session()->get('jenjang');
        $mapel = $this->mapelModel->where('jenjang =', $jenjang)->findAll();
        $data = array(
            'titlebar' => 'Data Guru',
            'title' => 'Edit Data Guru',
            'isi' => 'master/data-guru/edit',
            'validation' => \Config\Services::validation(),
            'mapel' => $mapel,
            'golongan' => $datagol,
            'data' => $this->guruModel->where('id_guru', $id)->where('id_sekolah', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        if (session()->get('level') == '1') {
            $nipLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nipLama['nip'] == $this->request->getPost('nip')) {
                $rule_nip = 'required|numeric|max_length[18]';
            } else {
                $rule_nip = 'required|numeric|max_length[18]|is_unique[mod_guru.nip]';
            }
            $nikLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nikLama['nik'] == $this->request->getPost('nik')) {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]';
            } else {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_guru.nik]';
            }
            $nuptkLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nuptkLama['nuptk'] == $this->request->getPost('nuptk')) {
                $rule_nuptk = 'required|numeric|max_length[16]';
            } else {
                $rule_nuptk = 'required|numeric|max_length[16]|is_unique[mod_guru.nuptk]';
            }
            $nrgLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nrgLama['nrg'] == $this->request->getPost('nrg')) {
                $rule_nrg = 'required|numeric|max_length[16]';
            } else {
                $rule_nrg = 'required|numeric|max_length[16]|is_unique[mod_guru.nrg]';
            }
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => $rule_nip,
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 18 digit.',
                        'is_unique' => 'NIP sudah ada.'
                    ]
                ],
                'nik' => [
                    'rules' => $rule_nik,
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong.',
                        'numeric' => 'NIK harus angka.',
                        'max_length' => 'NIK maximal 16 digit.',
                        'min_length' => 'NIK minimal 16 digit.',
                        'is_unique' => 'NIK sudah ada.'
                    ]
                ],
                'nuptk' => [
                    'rules' => $rule_nuptk,
                    'errors' => [
                        'required' => 'NUPTK tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NUPTK harus angka.',
                        'max_length' => 'NUPTK maximal 16 digit.',
                        'is_unique' => 'NUPTK sudah ada.'
                    ]
                ],
                'nrg' => [
                    'rules' => $rule_nrg,
                    'errors' => [
                        'required' => 'NRG tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NRG harus angka.',
                        'max_length' => 'NRG maximal 16 digit.',
                        'is_unique' => 'NRG sudah ada.'
                    ]
                ],
                'nmguru' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Guru tidak boleh kosong.',
                        'alpha_space' => 'Nama Guru harus huruf dan spasi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                    ]
                ],
                'tlahir' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Tempat Lahir tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Tempat Lahir berisi karakter yang tidak didukung.'
                    ]
                ],
                'tgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir tidak boleh kosong.',
                    ]
                ],
                'jenkel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus di pilih.',
                    ]
                ],
                'tingkat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tingkat Pendidikan harus di pilih.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di pilih.',
                    ]
                ],
                'jurusan' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Jurusan tidak boleh kosong.',
                        'alpha_space' => 'Jurusan harus huruf dan spasi.'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kepegawaian harus di pilih.',
                    ]
                ],
                'thnijazah' => [
                    'rules' => 'required|numeric|max_length[4]',
                    'errors' => [
                        'required' => 'Tahun Ijazah tidak boleh kosong.',
                        'numeric' => 'Tahun Ijazah harus angka.',
                        'max_length' => 'Tahun Ijazah maximal 4 digit.',
                    ]
                ],
                'stsserti' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Sertifikasi harus di pilih.',
                    ]
                ],
                'mapel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mata Pelajaran yang Diampu harus di pilih.',
                    ]
                ],
                'tmtguru' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Guru tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'jumlahjam' => [
                    'rules' => 'required|numeric|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Jam tidak boleh kosong.',
                        'numeric' => 'Jumlah Jam harus angka.',
                        'max_length' => 'Jumlah Jam maximal 2 digit.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[mod_siswa.email]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong.',
                        'valid_email' => 'Email tidak valid.',
                        'is_unique' => 'Email sudah terdaftar.',
                    ]
                ],
                'nohp' => [
                    'rules' => 'required|numeric|max_length[12]|min_length[11]',
                    'errors' => [
                        'required' => 'Nomor Handphone tidak boleh kosong.',
                        'numeric' => 'Nomor Handphone harus angka.',
                        'max_length' => 'Nomor Handphone maximal 12 digit.',
                        'min_length' => 'Nomor Handphone minimal 11 digit.',
                    ]
                ]
            ])) {
                //     return redirect()->to('/data-guru/add')->withInput()->with('validation', $validation);
                return redirect()->to(base_url('/data-guru/edit/' . $this->request->getPost('id')))->withInput();
            }
            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = $this->guruModel->find($id);
                $fileName = $data['foto'];
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotoguru/', $fileName);
                $data = $this->guruModel->find($id);
                $replace = $data['foto'];
                if (file_exists(ROOTPATH . 'public/media/fotoguru/' . $replace)) {
                    if ($data['foto'] != 'blank.png') {
                        unlink(ROOTPATH . 'public/media/fotoguru/' . $replace);
                    }
                }
            }
            $data = [
                'id_guru'             => $id,
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nrg'                 => $this->request->getPost('nrg'),
                'nama'                => $this->request->getPost('nmguru'),
                'alamat'              => $this->request->getPost('alamat'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtguru'             => $this->request->getPost('tmtguru'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'mapel'               => $this->request->getPost('mapel'),
                'jumlah_jam'          => $this->request->getPost('jumlahjam'),
                'sts_serti'           => $this->request->getPost('stsserti'),
                'thnsertifikasi'      => $this->request->getPost('thns'),
                'mapel_serti'         => $this->request->getPost('mapelserti'),
                'tgs_tambah'          => $this->request->getPost('tgstambah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'jabatan'             => $this->request->getPost('jabatan'),
                'no_sk'               => $this->request->getPost('nosk'),
                'tgl_sk'              => $this->request->getPost('tglsk'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'nohp'                => $this->request->getPost('nohp'),
                'email'               => $this->request->getPost('email'),
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->guruModel->save($data);
            session()->setFlashdata('m', 'Diedit');
            return redirect()->to(base_url('data-guru'));
        } elseif (session()->get('level') == '2') {
            $nipLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nipLama['nip'] == $this->request->getPost('nip')) {
                $rule_nip = 'required|numeric|max_length[18]';
            } else {
                $rule_nip = 'required|numeric|max_length[18]|is_unique[mod_guru.nip]';
            }
            $nikLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nikLama['nik'] == $this->request->getPost('nik')) {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]';
            } else {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_guru.nik]';
            }
            $nuptkLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nuptkLama['nuptk'] == $this->request->getPost('nuptk')) {
                $rule_nuptk = 'required|numeric|max_length[16]';
            } else {
                $rule_nuptk = 'required|numeric|max_length[16]|is_unique[mod_guru.nuptk]';
            }
            $nrgLama = $this->guruModel->where(['id_guru' => $id])->first();
            if ($nrgLama['nrg'] == $this->request->getPost('nrg')) {
                $rule_nrg = 'required|numeric|max_length[16]';
            } else {
                $rule_nrg = 'required|numeric|max_length[16]|is_unique[mod_guru.nrg]';
            }
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => $rule_nip,
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 18 digit.',
                        'is_unique' => 'NIP sudah ada.'
                    ]
                ],
                'nik' => [
                    'rules' => $rule_nik,
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong.',
                        'numeric' => 'NIK harus angka.',
                        'max_length' => 'NIK maximal 16 digit.',
                        'min_length' => 'NIK minimal 16 digit.',
                        'is_unique' => 'NIK sudah ada.'
                    ]
                ],
                'nuptk' => [
                    'rules' => $rule_nuptk,
                    'errors' => [
                        'required' => 'NUPTK tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NUPTK harus angka.',
                        'max_length' => 'NUPTK maximal 16 digit.',
                        'is_unique' => 'NUPTK sudah ada.'
                    ]
                ],
                'nrg' => [
                    'rules' => $rule_nrg,
                    'errors' => [
                        'required' => 'NRG tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NRG harus angka.',
                        'max_length' => 'NRG maximal 16 digit.',
                        'is_unique' => 'NRG sudah ada.'
                    ]
                ],
                'nmguru' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Guru tidak boleh kosong.',
                        'alpha_space' => 'Nama Guru harus huruf dan spasi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                    ]
                ],
                'tlahir' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Tempat Lahir tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Tempat Lahir berisi karakter yang tidak didukung.'
                    ]
                ],
                'tgllhr' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Lahir tidak boleh kosong.',
                    ]
                ],
                'jenkel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin harus di pilih.',
                    ]
                ],
                'tingkat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tingkat Pendidikan harus di pilih.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di pilih.',
                    ]
                ],
                'jurusan' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Jurusan tidak boleh kosong.',
                        'alpha_space' => 'Jurusan harus huruf dan spasi.'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Kepegawaian harus di pilih.',
                    ]
                ],
                'thnijazah' => [
                    'rules' => 'required|numeric|max_length[4]',
                    'errors' => [
                        'required' => 'Tahun Ijazah tidak boleh kosong.',
                        'numeric' => 'Tahun Ijazah harus angka.',
                        'max_length' => 'Tahun Ijazah maximal 4 digit.',
                    ]
                ],
                'mktahun' => [
                    'rules' => 'required|numeric|max_length[4]',
                    'errors' => [
                        'required' => 'Jumlah Tahun Masa Kerja tidak boleh kosong.',
                        'numeric' => 'Jumlah Tahun Masa Kerja harus angka.',
                        'max_length' => 'Jumlah Tahun Masa Kerja maximal 4 digit.',
                    ]
                ],
                'mkbulan' => [
                    'rules' => 'required|numeric|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Bulan Masa Kerja tidak boleh kosong.',
                        'numeric' => 'Jumlah Bulan Masa Kerja harus angka.',
                        'max_length' => 'Jumlah Bulan Masa Kerja maximal 2 digit.',
                    ]
                ],
                'stsserti' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Sertifikasi harus di pilih.',
                    ]
                ],
                'jabatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jabatan harus di pilih.',
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
                'mapel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mata Pelajaran yang Diampu harus di pilih.',
                    ]
                ],
                'tmtguru' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Guru tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'jumlahjam' => [
                    'rules' => 'required|numeric|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Jam tidak boleh kosong.',
                        'numeric' => 'Jumlah Jam harus angka.',
                        'max_length' => 'Jumlah Jam maximal 2 digit.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[mod_siswa.email]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong.',
                        'valid_email' => 'Email tidak valid.',
                        'is_unique' => 'Email sudah terdaftar.',
                    ]
                ],
                'nohp' => [
                    'rules' => 'required|numeric|max_length[12]|min_length[11]',
                    'errors' => [
                        'required' => 'Nomor Handphone tidak boleh kosong.',
                        'numeric' => 'Nomor Handphone harus angka.',
                        'max_length' => 'Nomor Handphone maximal 12 digit.',
                        'min_length' => 'Nomor Handphone minimal 11 digit.',
                    ]
                ]
            ])) {
                //     return redirect()->to('/data-guru/add')->withInput()->with('validation', $validation);
                return redirect()->to(base_url('/data-guru/edit/' . $this->request->getPost('id')))->withInput();
            }
            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = $this->guruModel->find($id);
                $fileName = $data['foto'];
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotoguru/', $fileName);
                $data = $this->guruModel->find($id);
                $replace = $data['foto'];
                if (file_exists(ROOTPATH . 'public/media/fotoguru/' . $replace)) {
                    if ($data['foto'] != 'blank.png') {
                        unlink(ROOTPATH . 'public/media/fotoguru/' . $replace);
                    }
                }
            }
            $data = [
                'id_guru'             => $id,
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nrg'                 => $this->request->getPost('nrg'),
                'nama'                => $this->request->getPost('nmguru'),
                'alamat'              => $this->request->getPost('alamat'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'mk_thn'              => $this->request->getPost('mktahun'),
                'mk_bln'              => $this->request->getPost('mkbulan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtguru'             => $this->request->getPost('tmtguru'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'mapel'               => $this->request->getPost('mapel'),
                'jumlah_jam'          => $this->request->getPost('jumlahjam'),
                'sts_serti'           => $this->request->getPost('stsserti'),
                'thnsertifikasi'      => $this->request->getPost('thns'),
                'mapel_serti'         => $this->request->getPost('mapelserti'),
                'tgs_tambah'          => $this->request->getPost('tgstambah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'jabatan'             => $this->request->getPost('jabatan'),
                'no_sk'               => $this->request->getPost('nosk'),
                'tgl_sk'              => $this->request->getPost('tglsk'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'nohp'                => $this->request->getPost('nohp'),
                'email'               => $this->request->getPost('email'),
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->guruModel->save($data);
            session()->setFlashdata('m', 'Diedit');
            return redirect()->to(base_url('data-guru'));
        }
    }
}
