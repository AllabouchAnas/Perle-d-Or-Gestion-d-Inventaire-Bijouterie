<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class TestController extends Controller
{
    public function insertData()
    {
        try {
            $db = \Config\Database::connect();

            // Insérer des données de test
            $db->table('users')->insert([
                'email' => 'testuser@example.com',
                'password' => password_hash('testpassword', PASSWORD_BCRYPT),
                'email_verified' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return "Données insérées avec succès dans la base de données.";
        } catch (DatabaseException $e) {
            return "Erreur lors de l'insertion : " . $e->getMessage();
        }
    }
}
