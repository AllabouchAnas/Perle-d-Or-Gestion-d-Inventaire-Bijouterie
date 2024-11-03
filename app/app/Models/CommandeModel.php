<?php

namespace App\Models;

use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table            = 'commandes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Enable soft deletes if needed
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';

    protected $protectFields    = true;
    protected $allowedFields    = ['date_commande', 'statut', 'prix_total', 'client_id'];

    // Data Handling Options
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Data Casting
    protected $casts = [
        'id'           => 'integer',
        'date_commande' => 'date',
        'statut'       => 'string',
        'prix_total'   => 'float',
        'client_id'    => 'integer'
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules
    protected $validationRules = [
        'date_commande' => 'required|valid_date',
        'statut'        => 'required|max_length[50]',
        'prix_total'    => 'required|decimal',
        'client_id'     => 'required|integer'
    ];

    protected $validationMessages = [
        'date_commande' => [
            'required'   => 'The order date is required',
            'valid_date' => 'Please enter a valid date for the order'
        ],
        'statut' => [
            'required'   => 'The order status is required',
            'max_length' => 'The order status cannot exceed 50 characters'
        ],
        'prix_total' => [
            'required'   => 'The total price is required',
            'decimal'    => 'The total price must be a decimal number'
        ],
        'client_id' => [
            'required'   => 'The client ID is required',
            'integer'    => 'The client ID must be an integer'
        ]
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
