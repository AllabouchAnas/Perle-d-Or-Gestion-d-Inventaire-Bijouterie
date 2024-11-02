<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategoriesSeeder');
        $this->call('FournisseursSeeder');
        $this->call('ProduitsSeeder');
        $this->call('ClientsSeeder');
        $this->call('CommandesSeeder');
        $this->call('DetailsCommandesSeeder');
    }
}
