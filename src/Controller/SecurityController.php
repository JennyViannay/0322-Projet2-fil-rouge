<?php

namespace App\Controller;

use App\Model\UserManager;

class SecurityController extends AbstractController
{
    public function login(): string
    {
        $userManager = new UserManager();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
                // TRAITEMENT DU FORMULAIRE (trim, ...)
                $user = $userManager->selectOneByEmail($_POST['email']);
                if ($user) {
                    if (md5($_POST['password']) === $user['password']) {
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'email' => $user['email']
                        ];
                        header('Location: /');
                    } else {
                        $errors['password'] = "Mot de passe incorrect";
                    }
                } else {
                    $errors[] = "L'utilisateur n'existe pas";
                }
            } else {
                $errors[] = "Tous les champs sont obligatoires";
            }
        }
        return $this->twig->render('Security/login.html.twig');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /');
    }

    public function register(): string
    {
        $userManager = new UserManager();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
                var_dump($_POST);
                // TRAITEMENT DU FORMULAIRE (trim, ...)
                $user = $userManager->selectOneByEmail($_POST['email']);
                if (!$user) {
                    $userManager->insert(['email' => $_POST['email'], 'password' => md5($_POST['password'])]);
                    header('Location: /login');
                } else {
                    $errors[] = "Cet email est déjà utilisé";
                }
            } else {
                $errors[] = "Tous les champs sont obligatoires";
            }
        }

        return $this->twig->render('Security/login.html.twig', [
            'errors' => $errors
        ]);
    }
}
