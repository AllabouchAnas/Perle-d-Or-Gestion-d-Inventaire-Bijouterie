<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailCommandeModel extends Model
{
    protected $table            = 'detailcommandes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Enable soft deletes if needed
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';

    protected $protectFields    = true;
    protected $allowedFields    = ['commande_id', 'produit_id', 'quantite', 'prix_unitaire'];

    // Data Handling Options
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Data Casting
    protected $casts = [
        'id'           => 'integer',
        'commande_id'  => 'integer',
        'produit_id'   => 'integer',
        'quantite'     => 'integer',
        'prix_unitaire' => 'float'
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules
    protected $validationRules = [
        'commande_id'   => 'required|integer',
        'produit_id'    => 'required|integer',
        'quantite'      => 'required|integer|greater_than[0]',
        'prix_unitaire' => 'required|decimal'
    ];

    protected $validationMessages = [
        'commande_id' => [
            'required' => 'The commande ID is required',
            'integer'  => 'The commande ID must be an integer'
        ],
        'produit_id' => [
            'required' => 'The produit ID is required',
            'integer'  => 'The produit ID must be an integer'
        ],
        'quantite' => [
            'required'      => 'The quantity is required',
            'integer'       => 'The quantity must be an integer',
            'greater_than'  => 'The quantity must be greater than 0'
        ],
        'prix_unitaire' => [
            'required' => 'The unit price is required',
            'decimal'  => 'The unit price must be a decimal number'
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks (if needed)
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
