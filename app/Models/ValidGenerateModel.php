<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidGenerateModel extends Model
{
    protected $table      = 'mod_valid_generate';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'tanggal', 'timestamp',
        'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
    public function cek_npsn($npsn)
    {
        return $this->db->table('mod_valid_generate')->where([
            'npsn' => $npsn
        ])->countAllResults();
    }
}
