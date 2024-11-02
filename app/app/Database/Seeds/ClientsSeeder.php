<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            $data = [
                'nom' => $faker->name,
                'email' => $faker->email,
                'telephone' => $faker->phoneNumber,
                'adresse' => $faker->address,
            ];
            $this->db->table('clients')->insert($data);
        }
    }
}
