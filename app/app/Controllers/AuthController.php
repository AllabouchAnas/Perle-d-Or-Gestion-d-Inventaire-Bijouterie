<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        // Charger le modèle
        $model = new UserModel();
    
        // Vérifier si les données sont envoyées en POST
        if ($this->request->getMethod() === 'post') {
            // Récupérer les données du formulaire
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Assurez-vous de hacher le mot de passe
            ];
    
            // Insérer les données dans la base de données
            if ($model->save($data)) {
                return redirect()->to('/login');
            } else {
                // Si une erreur se produit, afficher un message d'erreur
                return redirect()->back()->with('error', 'L\'inscription a échoué. Essayez encore.');
            }
        }
    
        return view('auth/register');
    }
    
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $model = new UserModel();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $model->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Authentifier l'utilisateur (généralement avec une session)
                return redirect()->to('/dashboard')->with('success', 'Connexion réussie !');
            } else {
                return redirect()->back()->with('error', 'Identifiants incorrects.');
            }
        }

        return view('auth/login');
    }

    public function verifyEmail($token)
    {
        // Implémentez la logique de vérification de l'email ici
    }
}
