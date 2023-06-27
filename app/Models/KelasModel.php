<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kelas','kode_kelas'];

    // Dates
    protected $useTimestamps = false;
}
