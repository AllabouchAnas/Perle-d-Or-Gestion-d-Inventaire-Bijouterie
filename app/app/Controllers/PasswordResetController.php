<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PasswordResetModel; // Assurez-vous de créer ce modèle
use CodeIgniter\Controller;

class PasswordResetController extends Controller
{
    public function requestReset()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $email = $this->request->getPost('email');

            $user = $model->where('email', $email)->first();
            if ($user) {
                // Générer un token et l'envoyer par email
                $token = bin2hex(random_bytes(50));
                $passwordResetModel = new PasswordResetModel();
                $passwordResetModel->insert([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                // Envoyer l'email avec le lien de réinitialisation
                // Mail::send($email, 'Réinitialiser votre mot de passe', 'Lien: '.base_url("passwordreset/{$token}"));

                return redirect()->back()->with('success', 'Un email de réinitialisation a été envoyé.');
            } else {
                return redirect()->back()->with('error', 'Aucun utilisateur trouvé avec cette adresse email.');
            }
        }

        return view('auth/request_reset');
    }

    public function resetPassword($token)
    {
        $passwordResetModel = new PasswordResetModel();
        $resetRequest = $passwordResetModel->where('token', $token)->first();

        if ($resetRequest) {
            if ($this->request->getMethod() === 'post') {
                $model = new UserModel();
                $password = $this->request->getPost('password');
                
                // Mettre à jour le mot de passe de l'utilisateur
                $model->update($resetRequest['email'], [
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                ]);

                // Supprimer le token après utilisation
                $passwordResetModel->delete($resetRequest['id']);

                return redirect()->to('/login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
            }
            return view('auth/reset_password', ['token' => $token]);
        } else {
            return redirect()->to('/login')->with('error', 'Le token de réinitialisation est invalide.');
        }
    }
}
