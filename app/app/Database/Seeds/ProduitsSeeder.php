<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProduitsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'nom' => $faker->word,
                'description' => $faker->sentence,
                'prix' => $faker->randomFloat(2, 5, 100),
                'quantite_en_stock' => $faker->numberBetween(1, 50),
                'materiau' => $faker->randomElement(['gold', 'silver', 'platinum']),
                'pierre_precieuse' => $faker->optional()->randomElement(['diamond', 'ruby', 'sapphire']),
                'categorie_id' => $faker->numberBetween(1, 10),  // Assuming you have 10 categories
                'fournisseur_id' => $faker->numberBetween(1, 10), // Assuming you have 10 fournisseurs
            ];
            $this->db->table('produits')->insert($data);
        }
    }
}
