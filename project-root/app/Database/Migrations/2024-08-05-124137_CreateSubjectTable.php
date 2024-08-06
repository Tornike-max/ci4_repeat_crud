<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubjectTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'subject_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'subject_duration' => [
                'type' => 'DATETIME',
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('subjects');
    }

    public function down()
    {
        $this->forge->dropTable('subjects');
    }
}
