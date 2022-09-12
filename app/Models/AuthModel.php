<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('mod_user')->where([
            'username' => $username
        ])->get()->getRowArray();
    }

    public function cek_error($ip, $status, $timestamp)
    {
        return $this->db->table('mod_log_invalid')->where([
            'ip' => $ip,
            'status_log' => $status,
            'timestamp' => $timestamp
        ])->countAllResults();
    }
}
