<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class Clients extends Controller
{
    protected $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    // 1. Display All Clients
    public function index()
    {
        $data['clients'] = $this->clientModel->findAll();
        return view('admin/clients/index', $data);
    }

    // 3. Save New Client
    public function store()
    {
        $data = [
            'nom'       => $this->request->getPost('nom'),
            'email'     => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'adresse'   => $this->request->getPost('adresse'),
        ];

        if ($this->clientModel->save($data)) {
            return redirect()->to('/clients')->with('success', 'Client created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->clientModel->errors())->withInput();
        }
    }

    // 5. Update Client
    public function update($id)
    {
        $data = [
            'id'        => $id,
            'nom'       => $this->request->getPost('nom'),
            'email'     => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'adresse'   => $this->request->getPost('adresse'),
        ];

        if ($this->clientModel->save($data)) {
            return redirect()->to('/clients')->with('success', 'Client updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->clientModel->errors())->withInput();
        }
    }

    // 6. Delete Client
    public function delete($id)
    {
        if ($this->clientModel->delete($id)) {
            return redirect()->to('/clients')->with('success', 'Client deleted successfully.');
        } else {
            return redirect()->to('/clients')->with('errors', 'Failed to delete client.');
        }
    }
}
