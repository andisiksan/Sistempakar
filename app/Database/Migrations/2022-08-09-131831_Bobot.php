<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bobot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'ket' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nilai' => [
                'type' => 'FLOAT',
                'constraint' => 5
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bobot');
    }

    public function down()
    {
        $this->forge->dropTable('bobot');
    }
}
