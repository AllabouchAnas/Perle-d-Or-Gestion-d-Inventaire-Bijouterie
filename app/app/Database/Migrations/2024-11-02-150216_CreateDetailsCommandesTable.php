<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailsCommandesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'commande_id'   => ['type' => 'INT', 'unsigned' => true],
            'produit_id'    => ['type' => 'INT', 'unsigned' => true],
            'quantite'      => ['type' => 'INT'],
            'prix_unitaire' => ['type' => 'FLOAT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('commande_id', 'commandes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produit_id', 'produits', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('details_commandes');
    }


    public function down()
    {
        //
    }
}
