<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kelas','kode_kelas','id_jurusan'];

    // Dates
    protected $useTimestamps = false;

    // Join tabel
    function getAll()
    {
        $builder = $this->db->table('kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $query = $builder->get();
        return $query->getResult();
    }
}
