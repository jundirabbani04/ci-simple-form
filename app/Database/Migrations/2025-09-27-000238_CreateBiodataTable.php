<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBiodataTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'gelar1' => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'gelar2' => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'tmpt_lahir' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'tgl_lahir' => ['type' => 'DATE'],
            'jk' => ['type' => 'INT', 'constraint' => 1], // 1 for Laki-laki, 2 for Perempuan
            'ibu_kandung' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'alamat_1' => ['type' => 'TEXT'],
            'provinsi' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'kab' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'kec' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'desa' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'rt' => ['type' => 'VARCHAR', 'constraint' => '5'],
            'rw' => ['type' => 'VARCHAR', 'constraint' => '5'],
            'agama' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'stat_kwn' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'hp1' => ['type' => 'VARCHAR', 'constraint' => '20'],
            'hp2' => ['type' => 'VARCHAR', 'constraint' => '20'],
            'mail' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'kerja' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'jenis_tmpt_kerja' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'nama_kerja1' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'usern' => ['type' => 'VARCHAR', 'constraint' => '100', 'unique' => true],
            'pasw' => ['type' => 'VARCHAR', 'constraint' => '255'], // For hashed password
            'foto' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'agreement' => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('biodata');
    }

    public function down()
    {
        $this->forge->dropTable('biodata');
    }
}