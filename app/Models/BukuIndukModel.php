<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuIndukModel extends Model
{
    protected $table      = 'mod_buku_induk';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nisn', 'nama', 'tempat_lahir', 'tgl_lahir',
        'jenis_kel', 'agama', 'alamat',
        'kelas', 'pkeahlian', 'jurusan', 'status', 'nohp', 'masuk', 'tamat',
        'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
