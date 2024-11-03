<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produits';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nom', 'description', 'prix', 'quantite_en_stock', 'materiau', 'pierre_precieuse', 'categorie_id', 'fournisseur_id'];
}
