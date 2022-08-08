<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'mod_pegawai';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nip', 'nik', 'nuptk', 'nama',
        'tempat_lahir', 'tgl_lahir', 'jenis_kel', 'golruang',
        'tingkat', 'jurusan', 'thnijazah', 'agama', 'status', 'tmtpegawai',
        'tmtsekolah', 'mk_thn', 'mk_bln', 'nmdiklat', 'tdiklat', 'lmdiklat', 'thndiklat', 'kehadiran', 'foto', 'sts_vaksin',
        'tgl_vaksin', 'lok_vaksin', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
