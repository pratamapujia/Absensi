<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id_jurusan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_jurusan'];

    function totalJurusan()
    {
        return $this->countAllResults();
    }
}
