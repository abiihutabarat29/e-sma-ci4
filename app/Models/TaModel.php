<?php

namespace App\Models;

use CodeIgniter\Model;

class TaModel extends Model
{
    protected $table      = 'mod_ta';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'tahun_akademik', 'userentry'
    ];
}
