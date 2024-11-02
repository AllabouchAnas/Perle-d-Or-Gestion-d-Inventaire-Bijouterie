<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FournisseursSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nom' => $faker->company,
                'email' => $faker->companyEmail,
                'telephone' => $faker->phoneNumber,
                'adresse' => $faker->address,
            ];
            $this->db->table('fournisseurs')->insert($data);
        }
    }
}
