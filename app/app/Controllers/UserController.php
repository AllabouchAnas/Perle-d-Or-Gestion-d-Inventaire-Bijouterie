<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Lire : Afficher la liste des utilisateurs
    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('users/index', $data);
    }

    // Mettre à jour : Afficher le formulaire de modification
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('users/edit', $data);
    }

    // Mettre à jour : Traitement du formulaire de modification
    public function update($id)
    {
        $data = $this->request->getPost();

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/users')->with('success', 'Utilisateur mis à jour avec succès.');
        } else {
            return redirect()->back()->with('errors', $this->userModel->errors());
        }
    }

    // Supprimer : Supprimer un utilisateur
    public function delete($id)
    {
        if ($this->userModel->delete($id)) {
            return redirect()->to('/users')->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            return redirect()->back()->with('error', 'Impossible de supprimer l\'utilisateur.');
        }
    }
}
