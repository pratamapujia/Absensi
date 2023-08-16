<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    public function getJamAbsen()
    {
        $builder = $this->db->table('jam_absen');
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function getLiburWeekend()
    {
        $builder = $this->db->table('libur');
        $builder->where('type','weekend');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getLiburNasional()
    {
        $builder = $this->db->table('libur');
        $builder->where('type','other');
        $query = $builder->get();
        return $query->getResult();
    }
}