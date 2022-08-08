<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table      = 'mod_kecamatan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'kode_kab', 'kode_wilayah', 'kecamatan', 'userentry'
    ];
}
