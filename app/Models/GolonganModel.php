<?php

namespace App\Models;

use CodeIgniter\Model;

class GolonganModel extends Model
{
    protected $table      = 'mod_golongan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'golongan', 'userentry'
    ];
}
