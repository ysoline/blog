<?php

class PostController

{
    /**
     * Recupere tous les articles
     *
     * @return void
     */
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        require('Views/Frontend/listPostView.php');
    }
    /**
     * Recupere un article grace à son idée
     *
     * @return void
     */
    public function post()
    {

        $postManager = new PostManager;
        $commentManager = new CommentManager;
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            require('Views/Frontend/postView.php');
            return $comments;
        } else {
            throw new Exception("Article introuvable !");
        }
    }
    /**
     * Ajout d'un article
     *
     * @return void
     */
    public function addPost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (!empty($_POST['title']) && !empty($_POST['post'])) {
                $addPost = new PostManager;
                $addPost->addPost(htmlspecialchars($_POST['title']), ($_POST['post']));
                header('Location: administration');
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Edition d'un article
     *
     * @return void
     */

    public function updatePost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postManager = new PostManager;
                $updatePost = $postManager->updatePost($_GET['id'], htmlspecialchars($_POST['title']), ($_POST['post']));
                header('Location: administration');
            } else {
                throw new Exception("Article introuvable !");
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Acces page d'édition d'article (Recuperation article)
     *
     * @return void
     */
    public function updatePostPage()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postManager = new PostManager;
                $post = $postManager->getPost($_GET['id']);
                require('Views/Backend/updatePostView.php');
            } else {
                throw new Exception("Article introuvable !");
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }

    /**
     * Supression d'un article
     *
     * @return void
     */
    public function deletePost()
    {

        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        $deletePost = new PostManager;
        $deleteCom = new CommentManager;

        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $deleteCom->delPostCom($_GET['id']);
                $deletePost->deletePost($_GET['id']);
                header('Location: administration');
            } else {
                throw new Exception("Article introuvable !");
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }

    /**
     * Redirection page ajout d'article
     *
     * @return void
     */
    public function postPage()
    {
        require('Views/Backend/addPostView.php');
    }
}
