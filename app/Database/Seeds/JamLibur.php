<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JamLibur extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type' => 'weekend',
                'tanggal_libur' => '2023-07-29',
                'keterangan_libur' => 'sabtu',
                'status' => 'Aktif',
            ],
            [
                'type' => 'weekend',
                'tanggal_libur' => '2023-07-30',
                'keterangan_libur' => 'minggu',
                'status' => 'Aktif',
            ],
        ];
        $this->db->table('libur')->insertBatch($data);
    }
}
