<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jurusan extends Seeder
{
    public function run()
    {
        $data = [
            ['jurusan' => 'OTKP'],
            ['jurusan' => 'RPL'],
            ['jurusan' => 'TBSM'],
            ['jurusan' => 'TKJ'],
            ['jurusan' => 'TKR'],
        ];
        $this->db->table('jurusan')->insertBatch($data);
    }
}
