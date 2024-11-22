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
            // Préparer les données pour l'insertion
            $data = [
                'complete_name' => $this->request->getPost('complete_name'),
                'email' => $this->request->getPost('email'),
                'password' =>$this->request->getPost('password'), PASSWORD_BCRYPT, // BCRYPT recommandé
                'email_verified' => 0, // Non vérifié par défaut
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $model = new UserModel();
            if ($model->save($data)) {
                return redirect()->to('/login')->with('success', 'Inscription réussie.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'enregistrement.');
            }
        } else {
            // Gestion des erreurs de validation
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
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validation des entrées
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Récupérer l'utilisateur
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $user['password'])) {
                // Mot de passe correct, connecter l'utilisateur
                $session->set([
                    'user_id' => $user['id'],
                    'complete_name' => $user['complete_name'],
                    'email' => $user['email'],
                    'is_logged_in' => true,
                ]);
                return redirect()->to('/admin')->with('success', 'Connexion réussie !');
            } else {
            
                log_message('error', 'Mot de passe incorrect pour l\'email : ' . $email);
                return redirect()->back()->with('error', 'Mot de passe incorrect.');
            }
        } else {
            
            log_message('error', 'Utilisateur introuvable avec l\'email : ' . $email);
            return redirect()->back()->with('error', 'Email introuvable.');
        }
    }

    return view('auth/login');
}

    
    
    
    

  /*  public function verifyEmail($token)
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
    }*/
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
