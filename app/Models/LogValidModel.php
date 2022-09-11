<?php

namespace App\Models;

use CodeIgniter\Model;

class LogValidModel extends Model
{
    protected $table      = 'mod_log_valid';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id', 'username', 'nama', 'foto', 'timestamp',
        'ip', 'useragent'
    ];
}
