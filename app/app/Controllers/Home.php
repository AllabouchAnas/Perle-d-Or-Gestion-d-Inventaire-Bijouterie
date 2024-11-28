<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\CommandeModel;
use App\Models\ClientModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

     public function admin(): string
    {
        $produitModel = new ProduitModel();
        $commandeModel = new CommandeModel();
        $clientsModel = new ClientModel();
        
        // Total Articles Vendus
        $clientsInscrits = $clientsModel->countAll();

        // Total Commandes
        $totalCommandes = $commandeModel->countAllResults();

        // Produits Totaux
        $produitsTotaux = $produitModel->countAllResults();

        // Valeur du Stock
        $produits = $produitModel->findAll();
        $valeurStock = array_reduce($produits, function($sum, $produit) {
            return $sum + ($produit['quantite_en_stock'] * $produit['prix']);
        }, 0);

        return view('admin/index', [
            'clientsInscrits' => $clientsInscrits,
            'totalCommandes' => $totalCommandes,
            'produitsTotaux' => $produitsTotaux,
            'valeurStock' => $valeurStock,
        ]);
    }
}
