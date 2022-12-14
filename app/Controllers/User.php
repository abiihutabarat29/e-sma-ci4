<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SekolahModel;
use CodeIgniter\Config\Config;

class User extends BaseController
{
    protected $userModel;
    protected $sekolahModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->sekolahModel = new SekolahModel();
    }
    public function user()
    {
        // jika tidak ingin menampilkan data superadmin
        $datauser = $this->userModel->where('level !=', 29)->findAll();
        // $datauser = $this->userModel->findAll();
        $data = array(
            'title' => 'Daftar User',
            'datauser' => $datauser,
            'isi' => 'master/user/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $sekolah = $this->sekolahModel->findAll();
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Tambah Data User',
            'isi' => 'master/user/add',
            'sekolah' => $sekolah,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih sekolah.',
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_user.nik]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong.',
                    'numeric' => 'NIK harus angka.',
                    'max_length' => 'NIK maximal 16 digit.',
                    'min_length' => 'NIK minimal 16 digit.',
                    'is_unique' => 'NIK sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required|max_length[12]|min_length[11]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maximal 12 digit.',
                    'min_length' => 'Nomor Handphone manimal 11 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
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
            'username' => [
                'rules' => 'required|max_length[25]|min_length[8]|is_unique[mod_user.username]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'max_length' => 'Username maximal 25 digit.',
                    'min_length' => 'Username minimal 8 digit.',

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to('add')->withInput();
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'id_sekolah'           => $this->request->getPost('sekolah'),
            'npsn'                 => $this->request->getPost('npsn'),
            'jenjang'              => $this->request->getPost('jenjang'),
            'nama_sekolah'         => $this->request->getPost('nmsekolah'),
            'nik'                  => $this->request->getPost('nik'),
            'nama'                 => $this->request->getPost('nama'),
            'nohp'                 => $this->request->getPost('nohp'),
            'email'                => $this->request->getPost('email'),
            'username'             => $this->request->getPost('username'),
            'foto'                 => 'blank.png',
            'password'             => $password,
            'level'                => $this->request->getPost('level'),
            'status'               => '1',
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-user'));
    }
    public function delete($id)
    {
        $this->userModel->delete->find($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-user'));
    }
    public function edit($id)
    {
        $sekolah = $this->sekolahModel->findAll();
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Edit User',
            'isi' => 'master/user/edit',
            'validation' => \Config\Services::validation(),
            'sekolah' => $sekolah,
            'data' => $this->userModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $npsnLama = $this->userModel->where(['id' => $id])->first();
        if ($npsnLama['npsn'] == $this->request->getPost('npsn')) {
            $rule_npsn = 'required|numeric|max_length[8]|min_length[8]';
        } else {
            $rule_npsn = 'required|numeric|max_length[8]|min_length[8]|is_unique[mod_user.npsn]';
        }
        $nikLama = $this->userModel->where(['id' => $id])->first();
        if ($nikLama['nik'] == $this->request->getPost('nik')) {
            $rule_nik = 'required|numeric|max_length[16]|min_length[16]';
        } else {
            $rule_nik = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_user.nik]';
        }
        $emailLama = $this->userModel->where(['id' => $id])->first();
        if ($emailLama['email'] == $this->request->getPost('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[mod_user.email]';
        }
        $usernameLama = $this->userModel->where(['id' => $id])->first();
        if ($usernameLama['username'] == $this->request->getPost('username')) {
            $rule_username = 'required|max_length[25]|min_length[8]';
        } else {
            $rule_username = 'required|max_length[25]|min_length[8]|is_unique[mod_user.username]';
        }

        //Validasi input
        if (!$this->validate([
            'sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih sekolah.',
                ]
            ],
            'npsn' => [
                'rules' => $rule_npsn,
                'errors' => [
                    'required' => 'NPSN tidak boleh kosong.',
                    'numeric' => 'NPSN harus angka.',
                    'max_length' => 'NPSN maximal 8 digit.',
                    'min_length' => 'NPSN minimal 8 digit.',
                    'is_unique' => 'NPSN sudah ada.'
                ]
            ],
            'nik' => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => 'NIK tidak boleh kosong.',
                    'numeric' => 'NIK harus angka.',
                    'max_length' => 'NIK maximal 16 digit.',
                    'min_length' => 'NIK minimal 16 digit.',
                    'is_unique' => 'NIK sudah terdaftar.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang tidak boleh kosong.',
                ]
            ],
            'nmsekolah' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Nama Sekolah tidak boleh kosong.',
                    'alpha_space' => 'Nama Sekolah harus huruf,angka dan spasi.'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required|max_length[12]|min_length[11]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maximal 12 digit.',
                    'min_length' => 'Nomor Handphone manimal 11 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
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
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'max_length' => 'Username maximal 25 digit.',
                    'min_length' => 'Username minimal 8 digit.',

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-user/edit/' . $this->request->getPost('id')))->withInput();
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'id'                   => $id,
            'id_sekolah'           => $this->request->getPost('sekolah'),
            'npsn'                 => $this->request->getPost('npsn'),
            'jenjang'              => $this->request->getPost('jenjang'),
            'nama_sekolah'         => $this->request->getPost('nmsekolah'),
            'nik'                  => $this->request->getPost('nik'),
            'nama'                 => $this->request->getPost('nama'),
            'nohp'                 => $this->request->getPost('nohp'),
            'email'                => $this->request->getPost('email'),
            'username'             => $this->request->getPost('username'),
            'password'             => $password,
            'level'                => $this->request->getPost('level'),
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Diedit');
        return redirect()->to(base_url('data-user'));
    }
    public function activated($id)
    {
        $data = [
            'id'     => $id,
            'status' => $this->request->getPost('status') == 1 ? 0 : 1,
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Diedit');
        return redirect()->to(base_url('data-user'));
    }
    // public function change_password($id)
    // {
    // 	if (!$this->validate([
    // 		'password' => [
    // 			'label' => 'Password',
    // 			'rules' => 'required|min_length[8]|max_length[255]',
    // 			'errors' => [
    // 				'required' 		=> 'Mohon isikan password',
    // 				'min_length' 	=> 'Password harus minimal 8 karakter',
    // 				'max_length' 	=> 'Password maksimal 255 karakter',
    // 			]
    // 		],
    // 		'pass_confirm' => [
    // 			'label' => 'Konfirmasi Password',
    // 			'rules' => 'required|matches[password]',
    // 			'errors' => [
    // 				'required' 		=> 'Mohon isikan konfirmasi password',
    // 				'matches' 		=> 'Password konfirmasi harus sama dengan password',
    // 			]
    // 		],
    // 	])) {
    // 		session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    // 		return redirect()->back()->withInput();
    // 	}
    // 	$newData = [
    // 		'password' => $this->request->getVar('password'),
    // 	];

    // 	$this->UserModel->update($id, $newData);
    // 	session()->setFlashdata('success', 'Password Berhasil di Update');
    // 	return redirect()->to(base_url('user/list'));
    // }

    //--------------------------------------------------------------------
}
