<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Enable soft deletes if needed
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';

    protected $protectFields    = true;
    protected $allowedFields    = ['nom'];

    // Options for data handling
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Data Casting
    protected $casts = [
        'id'  => 'integer',
        'nom' => 'string'
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules (example rules, customize as needed)
    protected $validationRules = [
        'nom' => 'required|max_length[100]'
    ];

    protected $validationMessages = [
        'nom' => [
            'required'   => 'The category name is required',
            'max_length' => 'The category name cannot exceed 100 characters'
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
