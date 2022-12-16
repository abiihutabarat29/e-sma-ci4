<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'mod_siswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nisn', 'nama', 'tempat_lahir', 'tgl_lahir',
        'jenis_kel', 'umur', 'agama', 'alamat',
        'kelas', 'pkeahlian', 'jurusan', 'status', 'nohp', 'email', 'program_pip',
        'tahun_msk', 'asal_sekolah', 'no_surat', 'sts_mutasi', 'keterangan', 'sts_vaksin', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];

    public function AllSiswa()
    {
        $jenjang = session()->get('jenjang');
        return $this->db->table('mod_siswa')->where('jenjang =', $jenjang)->get();
    }
}
