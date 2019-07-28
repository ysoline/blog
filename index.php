<?php
require('Autoloader.php');
Autoloader::register();

session_start();
if (isset($_SESSION['id'])) {
    header("location: index.php?action=auth");
}



try {
    if (isset($_GET['action'])) {

        //Liste tout les posts 
        if ($_GET['action'] == 'listPosts') {
            $posts = new PostController;
            $posts->listPosts();
        }

        //Affichage d'un post vis à vis de son id
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $post = new PostController;
                $post->post();
            } else {
                throw new Exception("Post introuvable !");
            }
        }

        //Ajout d'un commentaire
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    $affectedLines = new CommentController;
                    $affectedLines->addComment($_GET['id'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Post introuvable !');
            }
        }

        //Page de connexion
        elseif ($_GET['action'] == 'auth') {
            $authUser = new AuthController;
            $authUser->connectPage();
        }

        //Page d'insciption
        elseif ($_GET['action'] ==  'suscribePage') {
            $suscribeUser = new AuthController;
            $suscribeUser->suscribePage();
        }

        //Connexion
        elseif ($_GET['action'] == 'connect') {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                $coUser = new AuthController;
                $coUser->login($_POST['pseudo'], $_POST['pass']);
            } else {
                throw new Exception("Veuillez remplir tout les champs");
            }
        }

        //Inscription
        elseif ($_GET['action'] == 'suscribe') {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['email']) && !empty($_POST['email2'])) {
                $newUser = new AuthController;
                $newUser->newUser($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['email'], $_POST['email2']);
            } else {

                throw new Exception('Veuillez remplir tout les champs !');
            }
        }

        //page de profil
        elseif ($_GET['action'] == 'profil') {
            $profil = new UserController;
            $profil->profilPage();
        }

        //déconnexion
        elseif ($_GET['action'] == "disconnect") {
            $disconnect = new AuthController;
            $disconnect->disconnect();
        }

        // Retourne la liste de tous les posts sur aucunes actions n'est faite
    } else {
        $posts = new PostController;
        $posts->listPosts();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Views/Frontend/error.php');
}
