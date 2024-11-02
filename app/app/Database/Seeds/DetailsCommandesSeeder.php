<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailsCommandesSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 60; $i++) {
            $data = [
                'commande_id' => $faker->numberBetween(1, 30), // Assuming 30 commandes
                'produit_id' => $faker->numberBetween(1, 20),  // Assuming 20 produits
                'quantite' => $faker->numberBetween(1, 10),
                'prix_unitaire' => $faker->randomFloat(2, 5, 100),
            ];
            $this->db->table('details_commandes')->insert($data);
        }
    }
}
