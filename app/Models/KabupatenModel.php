<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $table      = 'mod_kabupaten';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'kode_wilayah', 'kabupaten', 'userentry'
    ];
}
