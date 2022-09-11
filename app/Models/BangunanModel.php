<?php

namespace App\Models;

use CodeIgniter\Model;

class BangunanModel extends Model
{
    protected $table      = 'mod_bangunan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'luas_tanah', 'luas_bangunan', 'luas_rpembangunan', 'luas_halaman',
        'luas_lapangan', 'luas_kosong', 'status_tanah', 'status_gedung',
        'jkelasx_mipa', 'jkelasx_iis', 'jkelasx_bhs', 'jkelasxi_mipa', 'jkelasxi_iis', 'jkelasxi_bhs',
        'jkelasxii_mipa', 'jkelasxii_iis', 'jkelasxii_bhs', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
