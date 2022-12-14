<?php

namespace App\Models;

use CodeIgniter\Model;

class SarprasModel extends Model
{
    protected $table      = 'mod_sarpras';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'prasarana', 'baik', 'rusak_ringan', 'rusak_berat', 'keterangan', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
