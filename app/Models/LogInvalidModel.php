<?php

namespace App\Models;

use CodeIgniter\Model;

class LogInvalidModel extends Model
{
    protected $table      = 'mod_log_invalid';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'username', 'password', 'timestamp',
        'ip', 'useragent', 'status_log'
    ];
}
