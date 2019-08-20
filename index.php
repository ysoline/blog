<?php
require('Autoloader.php');
Autoloader::register();

session_start();



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
                    $affectedLines->addComment($_GET['id'], $_SESSION['user_id'], $_SESSION['pseudo'], $_POST['comment']);
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
            $profil->profilPage($_SESSION['id_user']);
        }

        //déconnexion
        elseif ($_GET['action'] == "disconnect") {
            $disconnect = new AuthController;
            $disconnect->disconnect();
        }

        //Page d'édition de commentaire
        elseif ($_GET['action'] == 'comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comment = new CommentController;
                $comment->comment($_GET['id']);
            } else {
                throw new Exception("Commentaire introuvable !");
            }
        }

        //Edition de commentaire 
        elseif ($_GET['action'] == "editComment") {

            if (!empty($_POST['updateComment'])) {
                $editComment = new CommentController;
                $editComment->editComment($_POST['updateComment'], $_GET['id']);
            } else {
                throw new Exception('Impossible de modifier le commentaire');
            }
        }

        //Suppression de commentaire
        elseif ($_GET['action'] == "deleteComment") {
            if ($_POST['deleteCom'] == "SUPPRIMER") {
                $deleteComment = new CommentController;
                $deleteComment->deleteComment($_GET['id']);
            } else { {
                    throw new Exception('Impossible de supprimer le commentaire');
                }
            }
        }

        //Edition du pseudo
        elseif ($_GET['action'] == "editProfil") {
            if (!empty($_POST['pseudo'] && !empty($_POST['email']))) {
                $editProfil = new UserController;
                $editProfil->editProfil($_SESSION['id_user'], $_POST['pseudo'], $_POST['email']);
            } else {
                throw new Exception("Veuillir remplir tout les champs");
            }
        }

        //Edition du mot de passe
        elseif ($_GET['action'] == "editPass") {
            if (!empty($_POST['pass']) && !empty($_POST['pass2'])) {
                $editPass = new UserController;
                $editPass->editPass($_SESSION['id_user'], $_POST['pass']);
            }
        }

        //Suppression de compte
        elseif ($_GET['action'] == "deleteUser") {
            $deleteUser = new UserController;
            $deleteUser->deleteUser($_SESSION['id_user']);

            $disconnect = new AuthController;
            $disconnect->disconnect();


            //Accès panel admin
        } elseif ($_GET['action'] == "panelAdmin") {
            $findPost = new AdminController;
            $findPost->getPost();
        }

        //Ajout de post
        elseif ($_GET['action'] == "addPost") {
            $addPost = new PostController;
            $addPost->addPost();
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