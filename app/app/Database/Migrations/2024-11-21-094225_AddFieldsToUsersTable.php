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
                'null' => false,
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'email_verified' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['complete_name', 'date_of_birth', 'email_verified', 'reset_token']);
    }
}
