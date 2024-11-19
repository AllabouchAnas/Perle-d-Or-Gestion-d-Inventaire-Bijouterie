<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'password', 'email_verified'];

    // Validation des données
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'L\'adresse email est requise.',
            'valid_email' => 'Veuillez entrer une adresse email valide.',
            'is_unique' => 'Cette adresse email est déjà utilisée.',
        ],
        'password' => [
            'required' => 'Le mot de passe est requis.',
            'min_length' => 'Le mot de passe doit comporter au moins 6 caractères.',
        ],
    ];

    protected $useTimestamps = true; // Pour gérer automatiquement created_at et updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
