<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url']);
    
        $validation = \Config\Services::validation();
    
        $validation->setRules([
            'complete_name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]',
        ]);
    
        if ($this->request->getMethod() === 'POST') {
            if ($validation->run($this->request->getPost())) {
                // Prepare data for insertion
                $data = [
                    'complete_name' => $this->request->getPost('complete_name'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    'email_verified' => 0, // Default: not verified
                    'created_at' => date('Y-m-d H:i:s'),
                ];
    
                $model = new UserModel();
                $model->save($data);
    
                return redirect()->to('/login')->with('success', 'Inscription réussie.');
            } else {
                // Redirect back with errors
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }
    
        return view('auth/register');
    }
    

    public function login()
    {
        helper(['form', 'url']);
        $session = session();

        if ($this->request->getMethod() === 'POST') {
            // Validation des champs
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ]);

            if (!$validation->run($this->request->getPost())) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            // Vérification de l'utilisateur
            $model = new UserModel();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $model->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Stocker les informations dans la session
                $session->set([
                    'user_id' => $user['id'],
                    'complete_name' => $user['complete_name'],
                    'email' => $user['email'],
                    'is_logged_in' => true,
                ]);

                return redirect()->to('/register')->with('success', 'Connexion réussie !');
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
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
