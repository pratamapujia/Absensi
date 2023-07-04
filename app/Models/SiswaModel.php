<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id_siswa';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_siswa','nis','tgl_lahir','telepone_siswa','alamat_siswa','jenis_kelamin','id_kelas','id_jurusan','foto_siswa'];
    protected $useTimestamps    = true;

    // Join tabel
    function getAll()
    {
        $builder = $this->db->table('siswa');
        $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $builder->join('jurusan', 'jurusan.id_jurusan = siswa.id_jurusan');
        $query = $builder->get();
        return $query->getResult();
    }
}
