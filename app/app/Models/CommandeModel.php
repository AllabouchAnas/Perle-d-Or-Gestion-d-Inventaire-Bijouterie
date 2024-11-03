<?php

namespace App\Models;

use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table            = 'commandes';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['date_commande', 'statut', 'prix_total', 'client_id'];
}
