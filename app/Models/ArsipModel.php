<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table      = 'mod_labul';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nama_labul', 'bulan', 'tahun', 'file_labul',
        'validfile', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
    public function arsip($valid)
    {
        return $this->db->table('mod_labul')->where([
            'validfile' => $valid
        ])->get()->getRowArray();
    }

    public function filterdata($bulan, $tahun)
    {
        return $this->db->table('mod_labul')->where([
            'bulan' => $bulan,
            'tahun' => $tahun,
        ])->get();
    }
}
