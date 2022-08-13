<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\GolonganModel;
use CodeIgniter\Config\Config;

class DataPegawai extends BaseController
{
    protected $pegawaiModel;
    protected $golonganModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->golonganModel = new GolonganModel();
    }

    //funsgi api
    // public function data()
    // {
    //     $dataguru = $this->pegawaiModel->findAll();

    //     return $this->respond($dataguru, 200);
    // }

    public function datapegawai()
    {
        $npsn = session()->get('npsn');
        $datapegawai = $this->pegawaiModel->where('npsn =', $npsn)->findAll();

        $data = array(
            'title' => 'Data Pegawai',
            'datapegawai' => $datapegawai,
            'isi' => 'master/data-pegawai/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $datagol = $this->golonganModel->findAll();
        $data = array(
            'titlebar' => 'Data Pegawai',
            'title' => 'Form Tambah Data Pegawai',
            'isi' => 'master/data-pegawai/add',
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
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nip]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong.',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 16 digit.',
                        'min_length' => 'NIP minimal 16 digit.',
                        'is_unique' => 'NIP sudah ada.'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nik]',
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong.',
                        'numeric' => 'NIK harus angka.',
                        'max_length' => 'NIK maximal 16 digit.',
                        'min_length' => 'NIK minimal 16 digit.',
                        'is_unique' => 'NIK sudah ada.'
                    ]
                ],
                'nuptk' => [
                    'rules' => 'required|numeric|max_length[16]|is_unique[mod_pegawai.nuptk]',
                    'errors' => [
                        'required' => 'NUPTK tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NUPTK harus angka.',
                        'max_length' => 'NUPTK maximal 16 digit.',
                        'is_unique' => 'NUPTK sudah ada.'
                    ]
                ],
                'nmpegawai' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Pegawai tidak boleh kosong.',
                        'alpha_space' => 'Nama Pegawai harus huruf dan spasi.'
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
                'tmtpegawai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Pegawai tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, gif, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
            ])) {
                //     $validation = \Config\Services::validation();
                //     return redirect()->to('/data-pegawai/add')->withInput()->with('validation', $validation);
                return redirect()->to('/data-pegawai/add')->withInput();
            }

            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $fileName = "blank.png";
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotopegawai/', $fileName);
            }
            $data = [
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nama'                => $this->request->getPost('nmpegawai'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtpegawai'          => $this->request->getPost('tmtpegawai'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->pegawaiModel->save($data);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-pegawai'));
        } elseif (session()->get('level') == '2') {
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nip]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong.',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 16 digit.',
                        'min_length' => 'NIP minimal 16 digit.',
                        'is_unique' => 'NIP sudah ada.'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nik]',
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong.',
                        'numeric' => 'NIK harus angka.',
                        'max_length' => 'NIK maximal 16 digit.',
                        'min_length' => 'NIK minimal 16 digit.',
                        'is_unique' => 'NIK sudah ada.'
                    ]
                ],
                'nuptk' => [
                    'rules' => 'required|numeric|max_length[16]|is_unique[mod_pegawai.nuptk]',
                    'errors' => [
                        'required' => 'NUPTK tidak boleh kosong. Jika tidak ada isi angka 0',
                        'numeric' => 'NUPTK harus angka.',
                        'max_length' => 'NUPTK maximal 16 digit.',
                        'is_unique' => 'NUPTK sudah ada.'
                    ]
                ],
                'nmpegawai' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Pegawai tidak boleh kosong.',
                        'alpha_space' => 'Nama Pegawai harus huruf dan spasi.'
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
                'tmtpegawai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Pegawai tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, gif, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
            ])) {
                //     $validation = \Config\Services::validation();
                //     return redirect()->to('/data-pegawai/add')->withInput()->with('validation', $validation);
                return redirect()->to('/data-pegawai/add')->withInput();
            }

            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $fileName = "blank.png";
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotopegawai/', $fileName);
            }
            $data = [
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nama'                => $this->request->getPost('nmpegawai'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'mk_thn'              => $this->request->getPost('mktahun'),
                'mk_bln'              => $this->request->getPost('mkbulan'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtpegawai'          => $this->request->getPost('tmtpegawai'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->pegawaiModel->save($data);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-pegawai'));
        }
    }

    public function delete($id)
    {
        $data = $this->pegawaiModel->find($id);
        $foto = $data['foto'];
        if (file_exists(ROOTPATH . 'public/media/fotopegawai/' . $foto)) {
            if ($data['foto'] != 'blank.png') {
                unlink(ROOTPATH . 'public/media/fotopegawai/' . $foto);
            }
        }
        $this->pegawaiModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-pegawai'));
    }

    public function edit($id)
    {
        $datagol = $this->golonganModel->findAll();
        $data = array(
            'titlebar' => 'Data Pegawai',
            'title' => 'Form Edit Data Pegawai',
            'isi' => 'master/data-pegawai/edit',
            'golongan' => $datagol,
            'validation' => \Config\Services::validation(),
            'data' => $this->pegawaiModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        if (session()->get('level') == '1') {
            $nipLama = $this->pegawaiModel->where(['id' => $id])->first();
            if ($nipLama['nip'] == $this->request->getPost('nip')) {
                $rule_nip = 'required|numeric|max_length[16]|min_length[16]';
            } else {
                $rule_nip = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nip]';
            }
            $nikLama = $this->pegawaiModel->where(['id' => $id])->first();
            if ($nikLama['nik'] == $this->request->getPost('nik')) {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]';
            } else {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nik]';
            }
            $nuptkLama = $this->pegawaiModel->where(['id' => $id])->first();
            if ($nuptkLama['nuptk'] == $this->request->getPost('nuptk')) {
                $rule_nuptk = 'required|numeric|max_length[16]';
            } else {
                $rule_nuptk = 'required|numeric|max_length[16]|is_unique[mod_pegawai.nuptk]';
            }
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => $rule_nip,
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong.',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 16 digit.',
                        'min_length' => 'NIP minimal 16 digit.',
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
                'nmpegawai' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Pegawai tidak boleh kosong.',
                        'alpha_space' => 'Nama Pegawai harus huruf dan spasi.'
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
                'tmtpegawai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Pegawai tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, gif, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
            ])) {
                //     return redirect()->to('/data-pegawai/add')->withInput()->with('validation', $validation);
                return redirect()->to(base_url('data-pegawai/edit/' . $this->request->getPost('id')))->withInput();
            }

            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = $this->pegawaiModel->find($id);
                $fileName = $data['foto'];
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotopegawai/', $fileName);
                $data = $this->pegawaiModel->find($id);
                $replace = $data['foto'];
                if (file_exists(ROOTPATH . 'public/media/fotopegawai/' . $replace)) {
                    if ($data['foto'] != 'blank.png') {
                        unlink(ROOTPATH . 'public/media/fotopegawai/' . $replace);
                    }
                }
            }
            $data = [
                'id'                  => $id,
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nama'                => $this->request->getPost('nmpegawai'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtpegawai'          => $this->request->getPost('tmtpegawai'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->pegawaiModel->save($data);
            session()->setFlashdata('m', 'Diedit');
            return redirect()->to(base_url('data-pegawai'));
        } elseif (session()->get('level') == '2') {
            $nipLama = $this->pegawaiModel->where(['id' => $id])->first();
            if ($nipLama['nip'] == $this->request->getPost('nip')) {
                $rule_nip = 'required|numeric|max_length[16]|min_length[16]';
            } else {
                $rule_nip = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nip]';
            }
            $nikLama = $this->pegawaiModel->where(['id' => $id])->first();
            if ($nikLama['nik'] == $this->request->getPost('nik')) {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]';
            } else {
                $rule_nik = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_pegawai.nik]';
            }
            $nuptkLama = $this->pegawaiModel->where(['id' => $id])->first();
            if ($nuptkLama['nuptk'] == $this->request->getPost('nuptk')) {
                $rule_nuptk = 'required|numeric|max_length[16]';
            } else {
                $rule_nuptk = 'required|numeric|max_length[16]|is_unique[mod_pegawai.nuptk]';
            }
            //Validasi input
            if (!$this->validate([
                'nip' => [
                    'rules' => $rule_nip,
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong.',
                        'numeric' => 'NIP harus angka.',
                        'max_length' => 'NIP maximal 16 digit.',
                        'min_length' => 'NIP minimal 16 digit.',
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
                'nmpegawai' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Pegawai tidak boleh kosong.',
                        'alpha_space' => 'Nama Pegawai harus huruf dan spasi.'
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
                'tmtpegawai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Pegawai tidak boleh kosong.',
                    ]
                ],
                'tmtsekolah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'TMT Sekolah tidak boleh kosong.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,200]',
                    'errors' => [
                        'mime_in' => 'File extention hanya jpg, jpeg, gif, png.',
                        'is_image' => 'Upload hanya file foto.',
                        'max_size' => 'Ukuran gambar maksimal 200kb.'
                    ]
                ],
            ])) {
                //     return redirect()->to('/data-pegawai/add')->withInput()->with('validation', $validation);
                return redirect()->to(base_url('data-pegawai/edit/' . $this->request->getPost('id')))->withInput();
            }

            $foto   = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = $this->pegawaiModel->find($id);
                $fileName = $data['foto'];
            } else {
                $fileName = $foto->getRandomName();
                //move foto
                $foto->move(ROOTPATH . 'public/media/fotopegawai/', $fileName);
                $data = $this->pegawaiModel->find($id);
                $replace = $data['foto'];
                if (file_exists(ROOTPATH . 'public/media/fotopegawai/' . $replace)) {
                    if ($data['foto'] != 'blank.png') {
                        unlink(ROOTPATH . 'public/media/fotopegawai/' . $replace);
                    }
                }
            }
            $data = [
                'id'                  => $id,
                'nip'                 => $this->request->getPost('nip'),
                'nik'                 => $this->request->getPost('nik'),
                'nuptk'               => $this->request->getPost('nuptk'),
                'nama'                => $this->request->getPost('nmpegawai'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'golruang'            => $this->request->getPost('gol'),
                'tingkat'             => $this->request->getPost('tingkat'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'thnijazah'           => $this->request->getPost('thnijazah'),
                'mk_thn'              => $this->request->getPost('mktahun'),
                'mk_bln'              => $this->request->getPost('mkbulan'),
                'agama'               => $this->request->getPost('agama'),
                'status'              => $this->request->getPost('status'),
                'tmtpegawai'          => $this->request->getPost('tmtpegawai'),
                'tmtsekolah'          => $this->request->getPost('tmtsekolah'),
                'nmdiklat'            => $this->request->getPost('diklat'),
                'tdiklat'             => $this->request->getPost('tdiklat'),
                'lmdiklat'            => $this->request->getPost('lmdiklat'),
                'thndiklat'           => $this->request->getPost('thndiklat'),
                'kehadiran'           => $this->request->getPost('kehadiran'),
                'foto'                => $fileName,
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'tgl_vaksin'          => $this->request->getPost('tglvaksin'),
                'lok_vaksin'          => $this->request->getPost('lokvaksin'),
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->pegawaiModel->save($data);
            session()->setFlashdata('m', 'Diedit');
            return redirect()->to(base_url('data-pegawai'));
        }
    }
}
