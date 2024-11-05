<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@example.com',
            'password' => password_hash('password123', PASSWORD_BCRYPT),
            'email_verified' => 1,
        ];

        $this->db->table('users')->insert($data);
    }
}
