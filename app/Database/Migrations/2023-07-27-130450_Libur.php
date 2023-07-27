<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Libur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_libur'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'type'        => [
                'type'           => 'ENUM("weekend","other")',
            ],
            'tanggal_libur'        => [
                'type'           => 'VARCHAR',
                'constraint'       => 100,
            ],
            'keterangan_libur'        => [
                'type'           => 'VARCHAR',
                'constraint'       => 100,
            ],
            'status'        => [
                'type'           => 'ENUM("Aktif","Tidak Aktif")',
            ],
        ]);
        $this->forge->addKey('id_libur', true);
        $this->forge->createTable('libur');
    }

    public function down()
    {
        $this->forge->dropTable('libur');
    }
}
