<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nis'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
            ],
            'nama_siswa'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'tgl_lahir'        => [
                'type'           => 'DATE',
            ],
            'telepone_siswa'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
            ],
            'alamat_siswa'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'jenis_kelamin'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 5,
            ],
            'id_kelas'        => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'id_jurusan'        => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'foto_siswa'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at'         => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_siswa', true);
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas');
        $this->forge->addForeignKey('id_jurusan', 'jurusan', 'id_jurusan');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropForeignKey('kelas', 'kelas_id_kelas_foreign');
        $this->forge->dropForeignKey('jurusan', 'jurusan_id_jurusan_foreign');
        $this->forge->dropTable('siswa');
    }
}
