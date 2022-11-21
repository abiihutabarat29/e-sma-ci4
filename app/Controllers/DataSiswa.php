<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\TaModel;
use CodeIgniter\Config\Config;

class DataSiswa extends BaseController
{
    protected $siswaModel;
    protected $taModel;
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->taModel = new TaModel();
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
        $tahun = $this->taModel->findAll();
        $data = array(
            'titlebar' => 'Data Siswa',
            'title' => 'Tambah Data Siswa',
            'isi' => 'master/data-siswa/add',
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
                'email'               => $this->request->getPost('email'),
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
                'pkeahlian'           => $this->request->getPost('paketk'),
                'status'              => $this->request->getPost('status'),
                'nohp'                => $this->request->getPost('nohp'),
                'email'               => $this->request->getPost('email'),
                'tahun_msk'           => $this->request->getPost('thnmasuk'),
                'program_pip'         => $this->request->getPost('pip'),
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

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-siswa'));
    }

    public function edit($id)
    {
        $ids = session()->get('id_sekolah');
        $tahun = $this->taModel->findAll();
        $data = array(
            'titlebar' => 'Data Siswa',
            'title' => 'Edit Data Siswa',
            'isi' => 'master/data-siswa/edit',
            'tahun' => $tahun,
            'validation' => \Config\Services::validation(),
            'data' => $this->siswaModel->where('id', $id)->where('id_sekolah', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        if (session()->get('level') == '1') {
            $nisnLama = $this->siswaModel->where(['id' => $id])->first();
            if ($nisnLama['nisn'] == $this->request->getPost('nisn')) {
                $rule_nisn = 'required|numeric|max_length[10]|min_length[10]';
            } else {
                $rule_nisn = 'required|numeric|max_length[10]|min_length[10]|is_unique[mod_siswa.nisn]';
            }
            $emailLama = $this->siswaModel->where(['id' => $id])->first();
            if ($emailLama['email'] == $this->request->getPost('email')) {
                $rule_email = 'required|valid_email';
            } else {
                $rule_email = 'required|valid_email|is_unique[mod_siswa.email]';
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
                'email' => [
                    'rules' => $rule_email,
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
                'email'               => $this->request->getPost('email'),
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
        } elseif (session()->get('level') == '2') {
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
                'pkeahlian'           => $this->request->getPost('paketk'),
                'status'              => $this->request->getPost('status'),
                'nohp'                => $this->request->getPost('nohp'),
                'email'               => $this->request->getPost('email'),
                'tahun_msk'           => $this->request->getPost('thnmasuk'),
                'program_pip'         => $this->request->getPost('pip'),
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
    }
    public function datasiswanaik()
    {
        $npsn = session()->get('npsn');
        $datasiswa = $this->siswaModel->where('npsn =', $npsn)->findAll();
        $data = array(
            'title' => 'Naik Kelas',
            'datasiswa' => $datasiswa,
            'isi' => 'master/data-siswa/up',
            'validation' => \Config\Services::validation()
        );

        return view('layout/wrapper', $data);
    }
    public function loadsiswa()
    {
        $kelas = $_GET['kls'];
        if ($kelas == 0) {
            $npsn = session()->get('npsn');
            $data = $this->siswaModel->where('npsn =', $npsn)->findAll();
        } else {
            $npsn = session()->get('npsn');
            $data = $this->siswaModel->where('npsn =', $npsn)
                ->where('kelas =', $kelas)->findAll();
        }
        if (!empty($data)) {
            $i = 1;
            foreach ($data as $key => $r) : ?>
                <tr>
                    <td><input type="checkbox" name="id[]" class="chk-box" value="<?= $r['id']; ?>"></td>
                    <td><?= $i++; ?></td>
                    <td><?= $r['nisn']; ?></td>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $r['kelas']; ?></td>
                    <?php if (session()->get('level') == '1') { ?>
                        <td><?= $r['jurusan']; ?></td>
                    <?php } ?>
                    <?php if (session()->get('level') == '2') { ?>
                        <td><?= $r['pkeahlian']; ?></td>
                    <?php } ?>
                    <td><?= $r['status']; ?></td>
                    <td><?= $r['tahun_msk']; ?></td>
                </tr>
            <?php endforeach ?>
        <?php
        } else {
        ?>
            <tr>
                <td align="center">Tidak ada data</td>
            </tr>
<?php
        }
    }
    public function naik()
    {

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'naikkelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih kelas terlebih dahulu.',
                    ]
                ],
                'id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih siswa terlebih dahulu.',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'naikkelas' => $validation->getError('naikkelas'),
                        'id' => $validation->getError('id')
                    ]
                ];
            } else {
                $id = $this->request->getPost('id');
                $kelas = $this->request->getPost('naikkelas');
                $jumlah = count($id);
                for ($i = 0; $i < $jumlah; $i++) {
                    $data = [
                        'id'   => $id[$i],
                        'kelas' => $kelas,
                    ];
                    $this->siswaModel->save($data);
                }
                $msg = [
                    'sukses' => "Berhasil naik kelas"
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Permintaan tidak dapat diproses');
        }
    }
}
