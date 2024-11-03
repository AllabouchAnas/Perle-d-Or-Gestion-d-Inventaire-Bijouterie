<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produits';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Enable soft deletes if needed
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';

    protected $protectFields    = true;
    protected $allowedFields    = [
        'nom',
        'description',
        'prix',
        'quantite_en_stock',
        'materiau',
        'pierre_precieuse',
        'categorie_id',
        'fournisseur_id'
    ];

    // Options for data handling
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Data Casting
    protected $casts = [
        'id'                => 'integer',
        'prix'              => 'float',
        'quantite_en_stock' => 'integer',
        'categorie_id'      => 'integer',
        'fournisseur_id'    => 'integer'
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules (example rules, customize as needed)
    protected $validationRules = [
        'nom'               => 'required|max_length[100]',
        'prix'              => 'required|decimal',
        'quantite_en_stock' => 'required|integer',
        'materiau'          => 'required|max_length[50]',
        'categorie_id'      => 'required|integer',
        'fournisseur_id'    => 'required|integer'
    ];

    protected $validationMessages = [
        'nom' => [
            'required' => 'The product name is required',
            'max_length' => 'The product name cannot exceed 100 characters'
        ],
        'prix' => [
            'required' => 'The product price is required',
            'decimal' => 'The product price must be a decimal number'
        ],
        // Add other validation messages as needed
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks (if you need them)
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
