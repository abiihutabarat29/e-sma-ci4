<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table      = 'mod_mutasi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nisn', 'nama',
        'jenis_kel',  'kelas', 'jurusan', 'pkeahlian', 'asal_sekolah', 'no_surat', 'mutasi',
        'tahun', 'keterangan', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
