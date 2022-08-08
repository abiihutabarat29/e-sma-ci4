<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranaModel extends Model
{
    protected $table      = 'mod_sarana';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'sarana', 'jenjang', 'userentry'
    ];
}
