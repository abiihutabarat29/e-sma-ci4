<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table      = 'mod_sekolah';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'npsn', 'jenjang', 'sekolah', 'kabupaten', 'status_sekolah', 'userentry'
    ];

    public function AllSekolah()
    {
        $jenjang = session()->get('jenjang');
        return $this->db->table('mod_sekolah')->where('jenjang =', $jenjang)->get()->getResultArray();
    }
}
