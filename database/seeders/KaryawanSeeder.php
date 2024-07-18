<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            'nik' => '11001',
            'nama_lengkap' => 'Pratama Puji Ariyanto',
            'jabatan' => 'Programmer',
            'kd_departemen' => 'IT',
            'no_hp' => '083830694069',
            'password' => Hash::make('password'),
        ]);
    }
}
