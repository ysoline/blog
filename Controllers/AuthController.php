<?php
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié)

class AuthController
{
    /**
     * newUser
     * Inscription
     * @return void
     */
    public function newUser()
    {

        $userManager = new UserManager;
        $userCheck = $userManager->getPseudo($_POST['pseudo']);
        $userMail = $userManager->getMail($_POST['email']);
        $passHach = $_POST['pass'];

        if ($userCheck == 0) {
            if ($_POST['pass'] == $_POST['pass2']) {
                if ($userMail == 0) {
                    if ($_POST['email'] == $_POST['email2']) {
                        $passHach = password_hash($passHach, PASSWORD_DEFAULT);
                        $newUser = $userManager->addUser($_POST['pseudo'], $passHach, $_POST['email']);
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
        $userManager = new UserManager;

        $user = $userManager->getPseudo($_POST['pseudo']);

        $passOk = password_verify($_POST['pass'], $user['pass']);

        if ($passOk) {

            $_SESSION['id_user'] = $user['id'];

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
