<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JamAbsen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jam_absen'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'type'        => [
                'type'           => 'ENUM("Masuk","Keluar","Terlambat")',
            ],
            'mulai_absen'        => [
                'type'           => 'TIME',
            ],
            'selesai_absen'        => [
                'type'           => 'TIME',
            ],
        ]);
        $this->forge->addKey('id_jam_absen', true);
        $this->forge->createTable('jam_absen');
    }

    public function down()
    {
        $this->forge->dropTable('jam_absen');
    }
}
