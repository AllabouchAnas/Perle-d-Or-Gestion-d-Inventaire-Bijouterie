<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
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
        return view('admin/users/index', $data);
    }



    // Mettre à jour : Traitement du formulaire de modification
    public function update($id)
    {
        $data = [
            'id' => $id,
            'complete_name' => $this->request->getPost('complete_name'),
            'email'=> $this->request->getPost('email'),


        ];

        if ($this->userModel->save($data)) {
            return redirect()->to('/users')->with('success', 'user updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->userModel->errors())->withInput();
        }
    }

    // Supprimer : Supprimer un utilisateur
    public function delete($id)
    {
        if ($this->userModel->delete($id)) {
            return redirect()->to('/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to deleted user.');
        }
    }
}
