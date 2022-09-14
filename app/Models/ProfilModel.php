<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table      = 'mod_profil';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nama_sekolah', 'npsn', 'nss', 'nds',
        'nosiop', 'akreditas', 'thnberdiri', 'nosk',
        'tglsk', 'status', 'standar', 'waktub', 'kabupaten', 'kecamatan',
        'alamat', 'kodepos', 'telepon', 'nama_kepsek', 'nip', 'email', 'jenjang', 'website', 'namayys', 'alamatyys',
        'gmap', 'profil', 'foto', 'userentry'
    ];

    public function cek_data()
    {
        return $this->db->table('mod_profil')->get()->getRowArray();
    }
}
