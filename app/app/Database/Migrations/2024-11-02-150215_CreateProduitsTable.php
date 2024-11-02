<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nom'               => ['type' => 'VARCHAR', 'constraint' => '100'],
            'description'       => ['type' => 'TEXT', 'null' => true],
            'prix'              => ['type' => 'FLOAT'],
            'quantite_en_stock' => ['type' => 'INT'],
            'materiau'          => ['type' => 'VARCHAR', 'constraint' => '50'],
            'pierre_precieuse'  => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'categorie_id'      => ['type' => 'INT', 'unsigned' => true],
            'fournisseur_id'    => ['type' => 'INT', 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categorie_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fournisseur_id', 'fournisseurs', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produits');
    }


    public function down()
    {
        //
    }
}
