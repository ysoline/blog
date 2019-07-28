<?php
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié)

class AuthController
{

    public function log()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    /**
     * newUser
     * Inscription
     * @return void
     */
    public function newUser()
    {

        $userManager = new AuthManager;
        $userCheck = $userManager->getInfo($_POST['pseudo']);
        $userMail = $userManager->getMail($_POST['email']);

        if ($userCheck == 0) {
            if ($_POST['pass'] == $_POST['pass2']) {
                if ($userMail == 0) {
                    if ($_POST['email'] == $_POST['email2']) {
                        $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        $newUser = $userManager->addUser($_POST['pseudo'], $_POST['pass'], $_POST['email']);
                        header('Location: index.php?action=listPosts');
                    } else {
                        throw new Exception("Les adresses emails ne sont pas identiques");
                    }
                } else {
                    throw new Exception("l'adresse email est déjà utilisée");
                }
            } else {
                throw new Exception('Les mots de passes ne sont pas identiques');
            }
        } else {
            throw new Exception('Le pseudo est déjà utilisé');
        }
    }

    /**
     * login
     * Connexion
     * @return void
     */
    public function login()
    {
        $userManager = new AuthManager;

        $user = $userManager->getInfo($_POST['pseudo']);

        $passOk = password_verify($_POST['pass'], $user['pass']);

        if ($passOk) {

            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['pass'] = $user['pass'];
            $_SESSION['email'] = $user['email'];

            header('Location: index.php?action=listPosts');
        } else {
            throw new Exception('Mauvais identifiant ou mot de passe');
        }
    }

    /**
     * Renvoie la page de connexion
     *
     * @return void
     */
    public function connectPage() //Redirection page connexion
    {
        require('Views/Frontend/authView.php');
    }

    /**
     * Renvoi la page d'inscription
     *
     * @return void
     */
    public function suscribePage() //Redirection page inscription
    {
        require('Views/Frontend/suscribeView.php');
    }

    /**
     * Déconnection
     *
     * @return void
     */
    public function disconnect()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=listPosts');
    }
}