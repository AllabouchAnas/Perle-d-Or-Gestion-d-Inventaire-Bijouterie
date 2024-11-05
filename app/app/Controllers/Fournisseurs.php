<?php

namespace App\Controllers;

use App\Models\FournisseurModel;
use CodeIgniter\Controller;

class Fournisseurs extends Controller
{
    protected $fournisseurModel;

    public function __construct()
    {
        $this->fournisseurModel = new FournisseurModel();
    }

    // 1. Display All Suppliers
    public function index()
    {
        $data['fournisseurs'] = $this->fournisseurModel->findAll();
        return view('admin/fournisseurs/index', $data);
    }

    // 3. Save New Supplier
    public function store()
    {
        $data = [
            'nom'       => $this->request->getPost('nom'),
            'email'     => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'adresse'   => $this->request->getPost('adresse'),
        ];

        if ($this->fournisseurModel->save($data)) {
            return redirect()->to('/fournisseurs')->with('success', 'Supplier created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->fournisseurModel->errors())->withInput();
        }
    }

    // 5. Update Supplier
    public function update($id)
    {
        $data = [
            'id'        => $id,
            'nom'       => $this->request->getPost('nom'),
            'email'     => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'adresse'   => $this->request->getPost('adresse'),
        ];

        if ($this->fournisseurModel->save($data)) {
            return redirect()->to('/fournisseurs')->with('success', 'Supplier updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->fournisseurModel->errors())->withInput();
        }
    }

    // 6. Delete Supplier
    public function delete($id)
    {
        if ($this->fournisseurModel->delete($id)) {
            return redirect()->to('/fournisseurs')->with('success', 'Supplier deleted successfully.');
        } else {
            return redirect()->to('/fournisseurs')->with('errors', 'Failed to delete supplier.');
        }
    }
}
