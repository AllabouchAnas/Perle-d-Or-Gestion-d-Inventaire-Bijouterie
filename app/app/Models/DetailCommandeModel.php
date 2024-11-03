<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailCommandeModel extends Model
{
    protected $table            = 'detailcommandes';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['commande_id', 'produit_id', 'quantite', 'prix_unitaire'];
}
