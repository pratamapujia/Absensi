<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Absen extends Seeder
{
    public function run()
    {
        $data = [
            [
                'type' => 'Masuk',
                'mulai_absen' => '07:00:00',
                'selesai_absen' => '08:00:00'
            ],
            [
                'type' => 'Keluar',
                'mulai_absen' => '14:00:00',
                'selesai_absen' => '15:00:00'
            ],
            [
                'type' => 'Terlambat',
                'mulai_absen' => '08:00:59',
                'selesai_absen' => '13:59:59'
            ],
        ];
        $this->db->table('jam_absen')->insertBatch($data);
    }
}
