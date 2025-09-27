<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table            = 'biodata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    // This is a list of all columns that can be inserted or updated.
    protected $allowedFields    = [
        'nik', 'nama', 'gelar1', 'gelar2', 'tmpt_lahir', 'tgl_lahir', 'jk', 
        'ibu_kandung', 'alamat_1', 'provinsi', 'kab', 'kec', 'desa', 'rt', 'rw', 
        'agama', 'stat_kwn', 'hp1', 'hp2', 'mail', 'kerja', 'jenis_tmpt_kerja', 
        'nama_kerja1', 'usern', 'pasw', 'foto', 'agreement'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}