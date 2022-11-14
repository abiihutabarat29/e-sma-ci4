<?php

namespace App\Controllers;

use App\Models\ProgramModel;
use CodeIgniter\Config\Config;

class DataProgram extends BaseController
{
    protected $programModel;
    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }
    public function dataprogram()
    {
        $dataprogram = $this->programModel->findAll();
        $data = array(
            'title' => 'Data Program Keahlian',
            'data' => $dataprogram,
            'isi' => 'master/data-program/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Program Keahlian',
            'title' => 'Tambah Data Program Keahlian',
            'isi' => 'master/data-program/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'program' => [
                'rules' => 'required|is_unique[mod_program_keahlian.program]',
                'errors' => [
                    'required' => 'Nama Program Keahlian tidak boleh kosong.',
                    'is_unique' => 'Nama Program Keahlian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to('/data-program-keahlian/add')->withInput();
        }
        $data = [
            'program'       => $this->request->getPost('program'),
            'userentry'   => session()->get('nama'),
        ];
        $this->programModel->save($data);
        session()->setFlashdata('m', 'Ditambahkan');
        return redirect()->to(base_url('data-program-keahlian'));
    }

    public function delete($id)
    {
        $this->programModel->delete($id);
        session()->setFlashdata('m', 'Dihapus');
        return redirect()->to(base_url('data-program-keahlian'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Program Keahlian',
            'title' => 'Edit Data Program Keahlian',
            'isi' => 'master/data-program/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->programModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $programLama = $this->programModel->where(['id' => $id])->first();
        if ($programLama['program'] == $this->request->getPost('program')) {
            $rule_program = 'required';
        } else {
            $rule_program = 'required|is_unique[mod_program_keahlian.program]';
        }
        //Validasi input
        if (!$this->validate([
            'program' => [
                'rules' => $rule_program,
                'errors' => [
                    'required' => 'Nama Program Keahlian tidak boleh kosong.',
                    'is_unique' => 'Nama Program Keahlian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-program-keahlian/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'          => $id,
            'program'       => $this->request->getPost('program'),
            'userentry'   => session()->get('nama'),
        ];
        $this->programModel->save($data);
        session()->setFlashdata('m', 'Ditedit');
        return redirect()->to(base_url('data-program-keahlian'));
    }
}
