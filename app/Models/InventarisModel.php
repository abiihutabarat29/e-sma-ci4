<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table      = 'mod_inventaris';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'inventaris', 'dibutuhkan', 'ada', 'kurang', 'lebih', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
