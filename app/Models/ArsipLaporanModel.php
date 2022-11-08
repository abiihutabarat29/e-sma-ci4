<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipLaporanModel extends Model
{
    protected $table      = 'mod_arsip_laporan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_instansi', 'judul', 'bulan', 'tahun', 'file',
        'validfile', 'npsn', 'nama_instansi', 'userentry'
    ];
    public function arsip($valid)
    {
        return $this->db->table('mod_arsip_laporan')->where([
            'validfile' => $valid
        ])->get()->getRowArray();
    }
}
