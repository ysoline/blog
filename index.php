<?php
require('Autoloader.php');
Autoloader::register();

session_start();
if (isset($_SESSION['id'])) {
    header("location: index.php?action=auth");
}



try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $posts = new PostController;
            $posts->listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $post = new PostController;
                $post->post();
            } else {
                throw new Exception("Post introuvable !");
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (isset($_POST['comment']) && !empty($_POST['comment'])) {
                    $affectedLines = new CommentController;
                    $affectedLines->addComment($_GET['id'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Post introuvable !');
            }
        } elseif ($_GET['action'] == 'auth') //Redirection de page vers connexion
        {
            $authUser = new AuthController;
            $authUser->connectPage();
        } elseif ($_GET['action'] ==  'suscribePage') //Redirection de page vers inscription
        {
            $suscribeUser = new AuthController;
            $suscribeUser->suscribePage();
        } elseif ($_GET['action'] == 'connect') //Connexion d'un membre
        {
            if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && $_POST['pass'] && !empty($_POST['pass'])) {
                $coUser = new AuthController;
                $coUser->login($_POST['pseudo'], $_POST['pass']);

                $userId = new UserController; 
                $userId -> getId($id);

                
            } else {
                throw new Exception("Veuillez remplir tout les champs");
            }
        } elseif ($_GET['action'] == 'suscribe') //Inscription d'un membre
        {
            if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && $_POST['pass'] && !empty($_POST['pass']) && $_POST['pass2'] && !empty($_POST['pass2']) && $_POST['email'] && !empty($_POST['email']) && $_POST['email2'] && !empty($_POST['email2'])) {
                $newUser = new AuthController;
                $newUser->newUser($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['email'], $_POST['email2']);
            } else {

                throw new Exception('Veuillez remplir tout les champs !');
            }
        } elseif ($_GET['action'] == 'profil') {
            $profil = new UserController;
            $profil->profilPage();
            
        } elseif ($_GET['action'] == "disconnect") {
            $disconnect = new AuthController;
            $disconnect->disconnect();
        }
    } else {
        $posts = new PostController;
        $posts->listPosts();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Views/Frontend/error.php');
}
