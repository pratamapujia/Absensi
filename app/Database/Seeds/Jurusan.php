<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jurusan extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_jurusan' => 'OTKP'],
            ['nama_jurusan' => 'RPL'],
            ['nama_jurusan' => 'TBSM'],
            ['nama_jurusan' => 'TKJ'],
            ['nama_jurusan' => 'TKR'],
        ];
        $this->db->table('jurusan')->insertBatch($data);
    }
}
