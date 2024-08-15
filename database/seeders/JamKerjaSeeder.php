<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JamKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kd_jam' => 'JK001', 'nama_jam' => 'Reguler', 'awal_jam' => '06:00:00', 'akhir_jam' => '08:00:00', 'jam_masuk' => '07:00:00', 'jam_pulang' => '16:00:00'],
            ['kd_jam' => 'JK002', 'nama_jam' => 'Reguler Siang', 'awal_jam' => '12:00:00', 'akhir_jam' => '14:00:00', 'jam_masuk' => '13:00:00', 'jam_pulang' => '22:00:00'],
        ];
        DB::table('jam_kerja')->insert($data);
    }
}
