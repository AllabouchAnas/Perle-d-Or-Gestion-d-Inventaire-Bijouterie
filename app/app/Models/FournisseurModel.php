<?php

namespace App\Models;

use CodeIgniter\Model;

class FournisseurModel extends Model
{
    protected $table            = 'fournisseurs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Enable soft deletes if needed
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';

    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'email', 'telephone', 'adresse'];

    // Data Handling Options
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Data Casting
    protected $casts = [
        'id'        => 'integer',
        'nom'       => 'string',
        'email'     => 'string',
        'telephone' => 'string',
        'adresse'   => 'string'
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules
    protected $validationRules = [
        'nom'       => 'required|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'telephone' => 'required|max_length[15]',
        'adresse'   => 'max_length[255]'
    ];

    protected $validationMessages = [
        'nom' => [
            'required'   => 'The supplier name is required',
            'max_length' => 'The supplier name cannot exceed 100 characters'
        ],
        'email' => [
            'required'    => 'The email address is required',
            'valid_email' => 'Please enter a valid email address',
            'max_length'  => 'The email address cannot exceed 100 characters'
        ],
        'telephone' => [
            'required'   => 'The telephone number is required',
            'max_length' => 'The telephone number cannot exceed 15 characters'
        ],
        'adresse' => [
            'max_length' => 'The address cannot exceed 255 characters'
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
