<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nom'       => ['type' => 'VARCHAR', 'constraint' => '100'],
            'email'     => ['type' => 'VARCHAR', 'constraint' => '100'],
            'telephone' => ['type' => 'VARCHAR', 'constraint' => '15'],
            'adresse'   => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clients');
    }


    public function down()
    {
        //
    }
}
