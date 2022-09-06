<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisBarangModel extends Model
{
    protected $table      = 'mod_barang';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'inventaris', 'userentry'
    ];
}
