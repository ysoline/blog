<?php
require('Autoloader.php');
Autoloader::register();

session_start();


$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

try {

    switch ($action) {
            /////////////////////////////////////// Accueil ///////////////////////////////////////

        case '':
        case 'home':
            $posts = new PostController;
            $posts->listPosts();
            break;

            /////////////////////////////////////// Articles ///////////////////////////////////////

        case 'article':
            $post = new PostController;
            $post->post();
            break;

        case "publierArticle": //action ajouter article
            $addPost = new PostController;
            $addPost->addPost($_POST['title'], $_POST['post']);
            break;

        case "ajouterArticle": //Page ajout article
            $addPost = new PostController;
            $addPost->postPage();
            break;

        case 'supprimerArticle':
            $deletePost = new PostController;
            $deletePost->deletePost($_GET['id']);
            break;

        case 'editionArticle': //Page d'édition
            $editPPage = new PostController;
            $editPPage->editPostPage($_GET['id']);
            break;

        case 'editerArticle': //action éditer
            $editPost = new PostController;
            $editPost->editPost($_GET['id'], $_POST['title'], $_POST['post']);
            break;

            /////////////////////////////////////// Commentaires ///////////////////////////////////////
        case 'ajouterCommentaire':
            $affectedLines = new CommentController;
            $affectedLines->addComment($_GET['id'], $_SESSION['id_user'], $_POST['comment']);
            break;

        case 'commentaire':
            $comment = new CommentController;
            $comment->comment($_GET['id']);
            break;

        case 'editionCommentaire':
            $editComment = new CommentController;
            $editComment->editComment($_POST['updateComment'], $_GET['id']);
            break;


        case 'supprimerCommentaire':
            $deleteComment = new CommentController;
            $deleteComment->deleteComment($_GET['id']);
            break;

        case 'reporterCommentaire':

            $reportCom = new CommentController;
            $reportCom->reportComment($_GET['id']);
            break;

            /////////////////////////////////////// Administrations ///////////////////////////////////////
        case 'administration':
            $adminPanel = new AdminController;
            $adminPanel->adminPanel();
            break;

        case 'validerCommentaire':
            $resetReport = new AdminController;
            $resetReport->resetReport($_GET['id']);
            break;

        case 'publierCommentaire':
            $published = new AdminController;
            $published->published($_GET['id']);
            break;

        case 'archiverCommentaire':
            $unpublished = new AdminController;
            $unpublished->getUnpublished($_GET['id']);
            break;

            /////////////////////////////////////// Authentification ///////////////////////////////////////
        case 'connexion':
            $authUser = new AuthController;
            $authUser->connectPage();
            break;

        case 'connecter':
            $coUser = new AuthController;
            $coUser->login($_POST['pseudo'], $_POST['pass']);
            break;

        case 'deconnexion':
            $disconnect = new AuthController;
            $disconnect->disconnect();
            break;

        case 'inscription':
            $suscribeUser = new AuthController;
            $suscribeUser->suscribePage();
            break;

        case 'inscrit':
            $newUser = new AuthController;
            $newUser->newUser($_POST['pseudo'], $_POST['pass'], $_POST['pass2'], $_POST['email'], $_POST['email2']);
            break;

        case 'profil':
            $profil = new UserController;
            $profil->profilPage($_SESSION['id_user']);
            break;
            /////////////////////////////////////// Profil ///////////////////////////////////////

        case 'editionPseudo':
            $editPseudo = new UserController;
            $editPseudo->editPseudo($_SESSION['id_user'], $_POST['pseudo']);
            break;

        case 'editionMail':
            $editMail = new UserController;
            $editMail->editMail($_SESSION['id_user'], $_POST['email']);
            break;

        case 'editionMdp':
            $editPass = new UserController;
            $editPass->editPass($_SESSION['id_user'], $_POST['pass']);
            break;

        case 'suppressionCompte':
            $deleteUser = new UserController;
            $deleteUser->deleteUser($_SESSION['id_user']);

            $disconnect = new AuthController;
            $disconnect->disconnect();
            break;

        default:
            require 'Views/Frontend/404.php';
            break;
    }



    //         //redirection page ajout de post
    //         elseif ($_GET['action'] == "postPage") {
    //             $addPost = new PostController;
    //             $addPost->postPage();
    //         }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Views/Frontend/error.php');
}
