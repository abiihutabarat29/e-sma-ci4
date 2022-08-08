<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Config\Config;

class DataSiswa extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    //funsgi api
    // public function data()
    // {
    //     $dataguru = $this->siswaModel->findAll();

    //     return $this->respond($dataguru, 200);
    // }

    public function datasiswa()
    {
        $npsn = session()->get('npsn');
        $datasiswa = $this->siswaModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Data Siswa',
            'datasiswa' => $datasiswa,
            'isi' => 'master/data-siswa/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Siswa',
            'title' => 'Form Tambah Data Siswa',
            'isi' => 'master/data-siswa/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
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
        ])) {
            return redirect()->to('/data-siswa/add')->withInput();
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
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->siswaModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-siswa'));
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-siswa'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Siswa',
            'title' => 'Form Edit Data Siswa',
            'isi' => 'master/data-siswa/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->siswaModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $nisnLama = $this->siswaModel->where(['id' => $id])->first();
        if ($nisnLama['nisn'] == $this->request->getPost('nisn')) {
            $rule_nisn = 'required|numeric|max_length[10]|min_length[10]';
        } else {
            $rule_nisn = 'required|numeric|max_length[10]|min_length[10]|is_unique[mod_siswa.nisn]';
        }
        //Validasi input
        if (!$this->validate([
            'nisn' => [
                'rules' => $rule_nisn,
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
        ])) {
            return redirect()->to(base_url('data-siswa/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
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
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->siswaModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-siswa'));
    }
    public function datasiswanaik()
    {
        $npsn = session()->get('npsn');
        $datasiswa = $this->siswaModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Data Siswa',
            'datasiswa' => $datasiswa,
            'isi' => 'master/naik-kelas/data',
            'validation' => \Config\Services::validation()
        );

        return view('layout/wrapper', $data);
    }
    public function naik()
    {
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
        ])) {
            return redirect()->to('/data-siswa/add')->withInput();
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
            'id_sekolah'          => session()->get('id_sekolah'),
            'npsn'                => session()->get('npsn'),
            'nama_sekolah'        => session()->get('nama_sekolah'),
            'jenjang'             => session()->get('jenjang'),
            'userentry'           => session()->get('nama'),
        ];
        $this->siswaModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-siswa'));
    }
}
