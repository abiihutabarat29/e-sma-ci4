<?php

namespace App\Models;

use CodeIgniter\Model;

class KebutuhanModel extends Model
{
    protected $table      = 'mod_kebutuhan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'mapel', 'dibutuhkan', 'pns', 'nonpns', 'kurang',
        'lebih', 'keterangan', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
