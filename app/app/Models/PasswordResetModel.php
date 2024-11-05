<?php

namespace App\Models;

use CodeIgniter\Model;

class PasswordResetModel extends Model
{
    protected $table            = 'password_resets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'token', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $validationRules      = [
        'email' => 'required|valid_email',
        'token' => 'required|min_length[10]|max_length[255]',
    ];

    protected array $validationMessages   = [
        'email' => [
            'required' => 'L\'adresse email est requise.',
            'valid_email' => 'Veuillez entrer une adresse email valide.',
        ],
        'token' => [
            'required' => 'Le token est requis.',
            'min_length' => 'Le token doit comporter au moins 10 caractères.',
            'max_length' => 'Le token ne peut pas dépasser 255 caractères.',
        ],
    ];
    
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks (si nécessaire)
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
