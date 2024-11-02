<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommandesSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            $data = [
                'date_commande' => $faker->date,
                'statut' => $faker->randomElement(['pending', 'shipped', 'delivered', 'canceled']),
                'prix_total' => $faker->randomFloat(2, 20, 500),
                'client_id' => $faker->numberBetween(1, 15), // Assuming you have 15 clients
            ];
            $this->db->table('commandes')->insert($data);
        }
    }
}
