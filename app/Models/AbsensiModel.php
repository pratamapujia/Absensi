<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table            = 'jam_absen';
    protected $primaryKey       = 'id_jam_absen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['type','mulai_absen','selesai_absen'];

    public function getJamAbsen()
    {
        $builder = $this->db->table('jam_absen');
        $query = $builder->get();
        return $query->getResult();
    }
}