<?php

namespace App\Controllers;

use App\Models\MasukModel;
use App\Models\SiswaModel;
use App\Models\TaModel;
use CodeIgniter\Config\Config;

class SiswaMasuk extends BaseController
{
    protected $masukModel;
    protected $siswaModel;
    protected $taModel;
    public function __construct()
    {
        $this->masukModel = new MasukModel();
        $this->siswaModel = new SiswaModel();
        $this->taModel = new TaModel();
    }

    //funsgi api
    // public function data()
    // {
    //     $dataguru = $this->masukModel->findAll();

    //     return $this->respond($dataguru, 200);
    // }

    public function datasiswam()
    {
        $npsn = session()->get('npsn');
        $where = "npsn='$npsn' AND mutasi='pindahan'";
        $datasiswam = $this->masukModel->where($where)->findAll();
        $data = array(
            'title' => 'Mutasi Siswa Masuk',
            'datasiswam' => $datasiswam,
            'isi' => 'master/data-siswa-masuk/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $tahun = $this->taModel->findAll();
        $data = array(
            'titlebar' => 'Mutasi Siswa Masuk',
            'title' => 'Form Tambah Mutasi Siswa Masuk',
            'isi' => 'master/data-siswa-masuk/add',
            'tahun' => $tahun,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        if (session()->get('level') == '1') {
            //Validasi input
            if (!$this->validate([
                'nisn' => [
                    'rules' => 'required|numeric|max_length[10]|min_length[10]|is_unique[mod_siswa.nisn]',
                    'errors' => [
                        'required' => 'NISN tidak boleh kosong.',
                        'numeric' => 'NISN harus angka.',
                        'max_length' => 'NISN maximal 10 digit.',
                        'min_length' => 'NISN minimal 10 digit.',
                        'is_unique' => 'NISN sudah ada.'
                    ]
                ],
                'nmsiswa' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Siswa tidak boleh kosong.',
                        'alpha_space' => 'Nama Siswa harus huruf dan spasi.'
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
                'umur' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Umur harus di pilih.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di pilih.',
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                    ]
                ],
                'kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kelas harus di pilih.',
                    ]
                ],
                'jurusan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jurusan harus di pilih.',
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status harus di pilih.',
                    ]
                ],
                'thnmasuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Masuk harus di pilih.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'nosurat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat tidak boleh kosong.',
                    ]
                ],
                'asalsekolah' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Asal Sekolah tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Asal Sekolah harus huruf dan spasi.'
                    ]
                ],
            ])) {
                return redirect()->to('/data-siswa-masuk/add')->withInput();
            }
            $data = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nmsiswa'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'umur'                => $this->request->getPost('umur'),
                'agama'               => $this->request->getPost('agama'),
                'alamat'              => $this->request->getPost('alamat'),
                'kelas'               => $this->request->getPost('kelas'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'status'              => $this->request->getPost('status'),
                'nohp'                => $this->request->getPost('nohp'),
                'tahun_msk'           => $this->request->getPost('thnmasuk'),
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'no_surat'            => $this->request->getPost('nosurat'),
                'asal_sekolah'        => $this->request->getPost('asalsekolah'),
                'keterangan'          => $this->request->getPost('ket'),
                'sts_mutasi'          => 'pindahan',
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $datamutasi = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nmsiswa'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'kelas'               => $this->request->getPost('kelas'),
                'jurusan'             => $this->request->getPost('jurusan'),
                'asal_sekolah'        => $this->request->getPost('asalsekolah'),
                'no_surat'            => $this->request->getPost('nosurat'),
                'tahun'               => $this->request->getPost('thnmasuk'),
                'keterangan'          => $this->request->getPost('ket'),
                'mutasi'              => 'pindahan',
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->siswaModel->save($data);
            $this->masukModel->save($datamutasi);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-siswa-masuk'));
        } elseif (session()->get('level') == '2') {
            //Validasi input
            if (!$this->validate([
                'nisn' => [
                    'rules' => 'required|numeric|max_length[10]|min_length[10]|is_unique[mod_siswa.nisn]',
                    'errors' => [
                        'required' => 'NISN tidak boleh kosong.',
                        'numeric' => 'NISN harus angka.',
                        'max_length' => 'NISN maximal 10 digit.',
                        'min_length' => 'NISN minimal 10 digit.',
                        'is_unique' => 'NISN sudah ada.'
                    ]
                ],
                'nmsiswa' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Nama Siswa tidak boleh kosong.',
                        'alpha_space' => 'Nama Siswa harus huruf dan spasi.'
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
                'umur' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Umur harus di pilih.',
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama harus di pilih.',
                    ]
                ],
                'alamat' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                    ]
                ],
                'kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kelas harus di pilih.',
                    ]
                ],
                'paketk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Paket Keahlian harus di pilih.',
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status harus di pilih.',
                    ]
                ],
                'thnmasuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tahun Masuk harus di pilih.',
                    ]
                ],
                'stsvaksin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Vaksin harus di pilih.',
                    ]
                ],
                'nosurat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Surat tidak boleh kosong.',
                    ]
                ],
                'asalsekolah' => [
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Asal Sekolah tidak boleh kosong.',
                        'alpha_numeric_punct' => 'Asal Sekolah harus huruf dan spasi.'
                    ]
                ],
            ])) {
                return redirect()->to('/data-siswa-masuk/add')->withInput();
            }
            $data = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nmsiswa'),
                'tempat_lahir'        => $this->request->getPost('tlahir'),
                'tgl_lahir'           => $this->request->getPost('tgllhr'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'umur'                => $this->request->getPost('umur'),
                'agama'               => $this->request->getPost('agama'),
                'alamat'              => $this->request->getPost('alamat'),
                'kelas'               => $this->request->getPost('kelas'),
                'pkeahlian'           => $this->request->getPost('paketk'),
                'status'              => $this->request->getPost('status'),
                'nohp'                => $this->request->getPost('nohp'),
                'tahun_msk'           => $this->request->getPost('thnmasuk'),
                'program_pip'         => $this->request->getPost('pip'),
                'sts_vaksin'          => $this->request->getPost('stsvaksin'),
                'no_surat'            => $this->request->getPost('nosurat'),
                'asal_sekolah'        => $this->request->getPost('asalsekolah'),
                'keterangan'          => $this->request->getPost('ket'),
                'sts_mutasi'          => 'pindahan',
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $datamutasi = [
                'nisn'                => $this->request->getPost('nisn'),
                'nama'                => $this->request->getPost('nmsiswa'),
                'jenis_kel'           => $this->request->getPost('jenkel'),
                'kelas'               => $this->request->getPost('kelas'),
                'pkeahlian'           => $this->request->getPost('paketk'),
                'asal_sekolah'        => $this->request->getPost('asalsekolah'),
                'no_surat'            => $this->request->getPost('nosurat'),
                'tahun'               => $this->request->getPost('thnmasuk'),
                'keterangan'          => $this->request->getPost('ket'),
                'mutasi'              => 'pindahan',
                'id_sekolah'          => session()->get('id_sekolah'),
                'npsn'                => session()->get('npsn'),
                'nama_sekolah'        => session()->get('nama_sekolah'),
                'jenjang'             => session()->get('jenjang'),
                'userentry'           => session()->get('nama'),
            ];
            $this->siswaModel->save($data);
            $this->masukModel->save($datamutasi);
            session()->setFlashdata('m', 'Ditambahkan');
            return redirect()->to(base_url('data-siswa-masuk'));
        }
    }

    public function delete($id)
    {
        $this->masukModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-siswa-masuk'));
    }
}
