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

    function JumlahSiswaPerKelas($id_kelas)
    {
        // $builder = $this->db->table('siswa');
        // $builder->select('kelas.nama_kelas, COUNT(siswa.id_siswa) as jumlah_siswa');
        // $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        // $builder->groupBy('siswa.id_kelas');
        // $query = $builder->get();
        // return $query->getResult();

        return $this->db->table('siswa')->where('id_kelas', $id_kelas)->countAllResults();
    }

    function getSiswaByKelas($id_kelas)
    {
        $builder = $this->db->table('siswa');
        $builder->select('*');
        $builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $builder->where('siswa.id_kelas', $id_kelas);
        $query = $builder->get();
        return $query->getResult();
        // return $this->db->table('siswa')->where('id_kelas', $id_kelas)->get()->getResult();
    }
}
