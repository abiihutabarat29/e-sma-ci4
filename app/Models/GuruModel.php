<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table      = 'mod_guru';
    protected $primaryKey = 'id_guru';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_sekolah', 'nip', 'nik', 'nuptk', 'nrg', 'nama',
        'tempat_lahir', 'tgl_lahir', 'jenis_kel', 'golruang',
        'tingkat', 'jurusan', 'thnijazah', 'agama', 'status', 'tmtguru',
        'tmtsekolah', 'thnsertifikasi', 'mapel', 'jumlah_jam', 'mk_thn', 'mk_bln',
        'tgs_tambah', 'sts_serti', 'mapel_serti', 'jabatan', 'no_sk', 'tgl_sk',
        'nmdiklat', 'tdiklat', 'lmdiklat', 'thndiklat', 'kehadiran', 'foto', 'sts_vaksin',
        'tgl_vaksin', 'lok_vaksin', 'npsn', 'nama_sekolah', 'jenjang', 'userentry'
    ];
}
