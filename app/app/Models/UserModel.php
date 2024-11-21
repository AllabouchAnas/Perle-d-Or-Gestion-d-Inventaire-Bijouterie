<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Autoriser les champs suivants pour les insertions et mises à jour
    protected $allowedFields    = ['complete_name', 'email', 'password', 'email_verified', 'reset_token', 'created_at', 'updated_at'];

    // Options de contrôle
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Casts
    protected array $casts = [
        'email_verified' => 'boolean', // Assurer que `email_verified` est traité comme un booléen
    ];

    // Dates
    protected $useTimestamps = true; // Activer les timestamps automatiques
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; // Non utilisé ici mais disponible si `useSoftDeletes` est activé

    // Validation
    protected $validationRules      = [
        'complete_name' => 'required|min_length[3]|max_length[255]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];
    protected $validationMessages   = [
        'complete_name' => [
            'required' => 'Le nom complet est requis.',
            'min_length' => 'Le nom complet doit comporter au moins 3 caractères.',
            'max_length' => 'Le nom complet ne peut pas dépasser 255 caractères.',
        ],
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
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword']; // Hacher le mot de passe avant l'insertion
    protected $beforeUpdate   = ['hashPassword'];

    // Méthodes de rappel
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    // Méthodes utilitaires spécifiques
    /**
     * Génère un token de réinitialisation pour un utilisateur.
     */
    public function generateResetToken(string $email): ?string
    {
        $user = $this->where('email', $email)->first();
        if ($user) {
            $resetToken = bin2hex(random_bytes(16)); // Générer un token aléatoire
            $this->update($user['id'], ['reset_token' => $resetToken]);
            return $resetToken;
        }
        return null;
    }

    /**
     * Marque un email comme vérifié.
     */
    public function markEmailAsVerified(string $email): bool
    {
        return $this->where('email', $email)->set(['email_verified' => true, 'reset_token' => null])->update();
    }
}
//modified