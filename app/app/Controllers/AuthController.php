<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $model = new UserModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'email_verified' => 0, // Non vérifié par défaut
                'created_at' => date('Y-m-d H:i:s'),
            ];

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
        if ($this->request->getMethod() === 'post') {
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
