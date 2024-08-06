<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            $this->db->table('subjects')->insert($this->generateSubjects());
        }
    }

    private function generateSubjects()
    {
        $fakeObject = Factory::create();

        return [
            'subject_name' => $fakeObject->name('male'),
            'subject_duration' => $fakeObject->date(),
        ];
    }
}
