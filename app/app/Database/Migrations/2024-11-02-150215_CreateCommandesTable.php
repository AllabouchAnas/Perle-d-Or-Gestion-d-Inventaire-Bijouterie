<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommandesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'date_commande'  => ['type' => 'DATE'],
            'statut'         => ['type' => 'VARCHAR', 'constraint' => '50'],
            'prix_total'     => ['type' => 'FLOAT'],
            'client_id'      => ['type' => 'INT', 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('commandes');
    }


    public function down()
    {
        //
    }
}
