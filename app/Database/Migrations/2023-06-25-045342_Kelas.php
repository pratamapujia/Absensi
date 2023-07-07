<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kelas'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'kode_kelas'        => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'id_jurusan'        => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_kelas', true);
        $this->forge->addForeignKey('id_jurusan', 'jurusan', 'id_jurusan');
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropForeignKey('jurusan', 'jurusan_id_jurusan_foreign');
        $this->forge->dropTable('kelas');
    }
}
