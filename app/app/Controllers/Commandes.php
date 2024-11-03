<?php

namespace App\Controllers;

use App\Models\CommandeModel;
use CodeIgniter\Controller;

class Commandes extends Controller
{
    protected $commandeModel;

    public function __construct()
    {
        $this->commandeModel = new CommandeModel();
    }

    // 1. Display All Commandes (Orders)
    public function index()
    {
        $data['commandes'] = $this->commandeModel->findAll();
        return view('commandes/index', $data);
    }

    // 2. Show Form to Create New Commande
    public function create()
    {
        return view('commandes/create');
    }

    // 3. Save New Commande
    public function store()
    {
        $data = [
            'date_commande' => $this->request->getPost('date_commande'),
            'statut'        => $this->request->getPost('statut'),
            'prix_total'    => $this->request->getPost('prix_total'),
            'client_id'     => $this->request->getPost('client_id'),
        ];

        if ($this->commandeModel->save($data)) {
            return redirect()->to('/commandes')->with('success', 'Order created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->commandeModel->errors())->withInput();
        }
    }

    // 4. Show Form to Edit Existing Commande
    public function edit($id)
    {
        $data['commande'] = $this->commandeModel->find($id);

        if (!$data['commande']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Order with ID $id not found.");
        }

        return view('commandes/edit', $data);
    }

    // 5. Update Commande
    public function update($id)
    {
        $data = [
            'id'            => $id,
            'date_commande' => $this->request->getPost('date_commande'),
            'statut'        => $this->request->getPost('statut'),
            'prix_total'    => $this->request->getPost('prix_total'),
            'client_id'     => $this->request->getPost('client_id'),
        ];

        if ($this->commandeModel->save($data)) {
            return redirect()->to('/commandes')->with('success', 'Order updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->commandeModel->errors())->withInput();
        }
    }

    // 6. Delete Commande
    public function delete($id)
    {
        if ($this->commandeModel->delete($id)) {
            return redirect()->to('/commandes')->with('success', 'Order deleted successfully.');
        } else {
            return redirect()->to('/commandes')->with('errors', 'Failed to delete order.');
        }
    }
}
