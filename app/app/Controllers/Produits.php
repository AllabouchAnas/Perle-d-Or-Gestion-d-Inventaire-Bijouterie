<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use CodeIgniter\Controller;

class Produits extends Controller
{
    protected $produitModel;

    public function __construct()
    {
        $this->produitModel = new ProduitModel();
    }

    // 1. Display All Products
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('produits')
        ->select('produits.*, categories.nom AS categorie_nom, fournisseurs.nom AS fournisseur_nom')
        ->join('categories', 'produits.categorie_id = categories.id', 'left')
        ->join('fournisseurs', 'produits.fournisseur_id = fournisseurs.id', 'left');

        // Fetch products with joined category and supplier names
        $data['produits'] = $builder->get()->getResultArray();

        // Fetch all categories and suppliers for the dropdown
        $data['categories'] = $db->table('categories')->select('id, nom')->get()->getResultArray();
        $data['fournisseurs'] = $db->table('fournisseurs')->select('id, nom')->get()->getResultArray();

        return view('produits/index', $data);
    }


    // 2. Show Form to Create New Product
    public function create()
    {
        return view('produits/create');
    }

    // 3. Save New Product
    public function store()
    {
        $data = [
            'nom'               => $this->request->getPost('nom'),
            'description'       => $this->request->getPost('description'),
            'prix'              => $this->request->getPost('prix'),
            'quantite_en_stock' => $this->request->getPost('quantite_en_stock'),
            'materiau'          => $this->request->getPost('materiau'),
            'pierre_precieuse'  => $this->request->getPost('pierre_precieuse'),
            'categorie_id'      => $this->request->getPost('categorie_id'),
            'fournisseur_id'    => $this->request->getPost('fournisseur_id'),
        ];

        if ($this->produitModel->save($data)) {
            return redirect()->to('/produits')->with('success', 'Product created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->produitModel->errors())->withInput();
        }
    }

    // 4. Show Form to Edit Existing Product
    public function edit($id)
    {
        $data['produit'] = $this->produitModel->find($id);

        if (!$data['produit']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product with ID $id not found.");
        }

        return view('produits/edit', $data);
    }

    // 5. Update Product
    public function update($id)
    {
        $data = [
            'id'                => $id,
            'nom'               => $this->request->getPost('nom'),
            'description'       => $this->request->getPost('description'),
            'prix'              => $this->request->getPost('prix'),
            'quantite_en_stock' => $this->request->getPost('quantite_en_stock'),
            'materiau'          => $this->request->getPost('materiau'),
            'pierre_precieuse'  => $this->request->getPost('pierre_precieuse'),
            'categorie_id'      => $this->request->getPost('categorie_id'),
            'fournisseur_id'    => $this->request->getPost('fournisseur_id'),
        ];

        if ($this->produitModel->save($data)) {
            return redirect()->to('/produits')->with('success', 'Product updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->produitModel->errors())->withInput();
        }
    }

    // 6. Delete Product
    public function delete($id)
    {
        if ($this->produitModel->delete($id)) {
            return redirect()->to('/produits')->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->to('/produits')->with('errors', 'Failed to delete product.');
        }
    }
}
