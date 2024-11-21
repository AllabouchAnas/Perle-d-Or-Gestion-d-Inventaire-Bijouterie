<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'complete_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => '', // Valeur par défaut pour SQLite
                'null' => false, // Colonne non nullable
            ],
            'email_verified' => [
                'type' => 'BOOLEAN',
                'default' => false, // Valeur par défaut
            ],
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true, // Colonne nullable
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['complete_name', 'email_verified', 'reset_token']);
    }
}
