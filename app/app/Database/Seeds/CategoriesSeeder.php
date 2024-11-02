<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nom' => $faker->word,
            ];
            $this->db->table('categories')->insert($data);
        }
    }
}
