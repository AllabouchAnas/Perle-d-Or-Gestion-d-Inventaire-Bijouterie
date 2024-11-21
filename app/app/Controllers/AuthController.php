<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $model = new UserModel();

        // Validation des champs
        $validation =  \Config\Services::validation();

        // Définir les règles de validation
        $validation->setRules([
            'complete_name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]',
        ]);

        if ($this->request->getMethod() === 'POST') {
            // Récupérer les données du formulaire
            $data = [
                'complete_name' => $this->request->getPost('complete_name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'email_verified' => 0, // Non vérifié par défaut
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Validation des données
            if (!$validation->run($data)) {
                // Si la validation échoue, retourner à la vue avec les erreurs
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            // Insérer les données dans la base
            if ($model->insert($data)) {
                // Vous pouvez envoyer un email de vérification ici
                return redirect()->to('/login')->with('success', 'Inscription réussie !');
            } else {
                return redirect()->back()->with('errors', $model->errors());
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

            // Vérifier si l'utilisateur existe et si le mot de passe est correct
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
        // Exemple : récupérer l'utilisateur par le token et mettre à jour l'état de vérification
        $model = new UserModel();
        $user = $model->where('email_verified_token', $token)->first();

        if ($user) {
            // Activer l'email_verified
            $user['email_verified'] = 1;
            $model->save($user);

            return redirect()->to('/login')->with('success', 'Votre email a été vérifié avec succès.');
        }

        return redirect()->to('/login')->with('error', 'Token de vérification invalide.');
    }
}
