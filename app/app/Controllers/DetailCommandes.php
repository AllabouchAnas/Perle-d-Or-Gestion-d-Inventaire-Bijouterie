<?php

namespace App\Controllers;

use App\Models\DetailCommandeModel;
use CodeIgniter\Controller;

class DetailCommandes extends Controller
{
    protected $detailCommandeModel;

    public function __construct()
    {
        $this->detailCommandeModel = new DetailCommandeModel();
    }

    // 1. Display All Order Details
    public function index()
    {
        $data['detailCommandes'] = $this->detailCommandeModel->findAll();
        return view('detail_commandes/index', $data);
    }

    // 2. Show Form to Create New Order Detail
    public function create()
    {
        return view('detail_commandes/create');
    }

    // 3. Save New Order Detail
    public function store()
    {
        $data = [
            'commande_id'   => $this->request->getPost('commande_id'),
            'produit_id'    => $this->request->getPost('produit_id'),
            'quantite'      => $this->request->getPost('quantite'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire'),
        ];

        if ($this->detailCommandeModel->save($data)) {
            return redirect()->to('/detailcommandes')->with('success', 'Order detail created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->detailCommandeModel->errors())->withInput();
        }
    }

    // 4. Show Form to Edit Existing Order Detail
    public function edit($id)
    {
        $data['detailCommande'] = $this->detailCommandeModel->find($id);

        if (!$data['detailCommande']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Order detail with ID $id not found.");
        }

        return view('detail_commandes/edit', $data);
    }

    // 5. Update Order Detail
    public function update($id)
    {
        $data = [
            'id'            => $id,
            'commande_id'   => $this->request->getPost('commande_id'),
            'produit_id'    => $this->request->getPost('produit_id'),
            'quantite'      => $this->request->getPost('quantite'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire'),
        ];

        if ($this->detailCommandeModel->save($data)) {
            return redirect()->to('/detailcommandes')->with('success', 'Order detail updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->detailCommandeModel->errors())->withInput();
        }
    }

    // 6. Delete Order Detail
    public function delete($id)
    {
        if ($this->detailCommandeModel->delete($id)) {
            return redirect()->to('/detailcommandes')->with('success', 'Order detail deleted successfully.');
        } else {
            return redirect()->to('/detailcommandes')->with('errors', 'Failed to delete order detail.');
        }
    }
}
