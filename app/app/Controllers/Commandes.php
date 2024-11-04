<?php

namespace App\Controllers;

use App\Models\CommandeModel;
use App\Models\ClientModel;
use CodeIgniter\Controller;

class Commandes extends Controller
{
    protected $commandeModel;
    protected $clientModel;

    public function __construct()
    {
        $this->commandeModel = new CommandeModel();
        $this->clientModel = new ClientModel(); // Assurez-vous d'avoir un modèle pour les clients
    }

    public function index()
    {
        // Récupérer les commandes avec le nom du client
        $db = \Config\Database::connect();
        $builder = $db->table('commandes');
        $builder->select('commandes.*, clients.nom AS client_nom');
        $builder->join('clients', 'commandes.client_id = clients.id');

        $data['commandes'] = $builder->get()->getResultArray();
        $data['clients'] = $this->clientModel->findAll(); // Récupérer tous les clients pour le formulaire de sélection

        return view('commandes/index', $data);
    }

    public function create()
    {
        $data['clients'] = $this->clientModel->findAll(); // Récupérer tous les clients
        return view('commandes/create', $data);
    }

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

    public function edit($id)
    {
        $data['commande'] = $this->commandeModel->find($id);
        $data['clients'] = $this->clientModel->findAll(); // Récupérer tous les clients

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
