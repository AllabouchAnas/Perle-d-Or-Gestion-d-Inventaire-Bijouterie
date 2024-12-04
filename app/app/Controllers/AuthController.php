<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url', 'text']);

        $validation = \Config\Services::validation();

        $validation->setRules([
            'complete_name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]',
        ]);

        if ($this->request->getMethod() === 'POST') {
            if ($validation->run($this->request->getPost())) {
                $model = new UserModel();

                $data = [
                    'complete_name' => $this->request->getPost('complete_name'),
                    'email' => $this->request->getPost('email'),
                    'password' =>$this->request->getPost('password'), PASSWORD_BCRYPT,
                    'email_verified' => 0,
                    'created_at' => Time::now(),
                ];

                if ($model->save($data)) {
                    // Generate a secure token for email
                    $email = urlencode(base64_encode($data['email']));
                    $link = base_url("/verif/{$email}");

                    // Configure email service
                    $emailService = \Config\Services::email();
                    $emailService->setTo($data['email']);
                    $emailService->setSubject('Vérification de votre email - Perle d\'Or');
                    $emailService->setMailType('html');

                    // Set email message with improved template
                    $emailService->setMessage("
                        <html>
                        <head>
                            <title>Vérification de votre email - Perle d'Or</title>
                        </head>
                        <body style='font-family: Arial, sans-serif;'>
                            <h2>Bienvenue chez Perle d'Or !</h2>
                            <p>Bonjour <strong>{$data['complete_name']}</strong>,</p>
                            <p>Merci de vous être inscrit à <strong>Perle d'Or</strong>,
                            <p>Pour finaliser votre inscription et sécuriser votre compte, veuillez vérifier votre adresse email en cliquant sur le lien ci-dessous :</p>
                            <p><a href='{$link}'>{$link}</a></p>
                            <p>Si vous n'avez pas créé de compte, veuillez ignorer cet email.</p>
                            <br>
                            <p>À bientôt,</p>
                            <p><strong>L'équipe Perle d'Or</strong></p>
                        </body>
                        </html>
                    ");

                    // Send email
                    if ($emailService->send()) {
                        return redirect()->to('/login')->with('success', 'Inscription réussie. Veuillez vérifier votre email.');
                    } else {
                        return redirect()->back()->with('error', 'Erreur lors de l\'envoi de l\'email de vérification.');
                    }
                } else {
                    return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'enregistrement.');
                }
            } else {
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

            if (!$this->validate(['email' => 'required|valid_email', 'password' => 'required|min_length[6]'])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $user = $model->where('email', $email)->first();

            if ($user) {
                if ($user['email_verified'] == 0) {
                    return redirect()->back()->with('error', 'Veuillez vérifier votre email avant de vous connecter.');
                }

                if (password_verify($password, $user['password'])) {
                    $session->set([
                        'user_id' => $user['id'],
                        'complete_name' => $user['complete_name'],
                        'email' => $user['email'],
                        'is_logged_in' => true,
                    ]);

                    return redirect()->to('/admin')->with('success', 'Connexion réussie !');
                } else {
                    return redirect()->back()->with('error', 'Mot de passe incorrect.');
                }
            } else {
                return redirect()->back()->with('error', 'Email introuvable.');
            }
        }

        return view('auth/login');
    }

    public function verifyEmail($token)
    {
        $model = new UserModel();
        $email = base64_decode(urldecode($token));

        $user = $model->where('email', $email)->first();

        if ($user) {
            // $user['email_verified'] = 1;
            // var_dump($user);die();
            $model->update($user['id'], ['email_verified' => 1]);

            return redirect()->to('/login')->with('success', 'Votre email a été vérifié avec succès.');
        }

        return redirect()->to('/login')->with('error', 'Lien de vérification invalide.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Déconnexion réussie.');
    }
}
