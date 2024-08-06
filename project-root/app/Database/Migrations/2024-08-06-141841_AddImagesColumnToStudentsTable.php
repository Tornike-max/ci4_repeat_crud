<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImagesColumnToStudentsTable extends Migration
{
    public function up()
    {
        $fields = [
            'student_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]
        ];
        $this->forge->addColumn('students', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('students', 'student_image');
    }
}
