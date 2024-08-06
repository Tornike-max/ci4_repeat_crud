<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $this->db->table('students')->insert($this->generateStudents());
        }
    }

    private function generateStudents()
    {
        $faker = Factory::create();

        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'subject_id' => $faker->numberBetween(0, 30)
        ];
    }
}
