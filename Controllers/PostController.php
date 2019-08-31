<?php

class PostController

{
    /**
     * Récupère tous les posts
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
     * Récupère un post grace à son idée
     *
     * @return void
     */
    public function post()
    {
        $postManager = new PostManager;
        $commentManager = new CommentManager;
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('Views/Frontend/postView.php');
        return $comments;
    }
    /**
     * Ajout de billet
     *
     * @return void
     */
    public function addPost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            $addPost = new PostManager;
            $addPost->addPost(htmlspecialchars($_POST['title']), ($_POST['post']));
            header('Location: index.php?action=listPosts');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Edition de post
     *
     * @return void
     */
    /**
     * édition d'un post (formulaire édition)
     *
     * @return void
     */
    public function editPost()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {
            $postManager = new PostManager;
            $editPost = $postManager->editPost($_GET['id'], htmlspecialchars($_POST['title']), ($_POST['post']));
            header('Location: index.php?action=panelAdmin');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Accès page d'édition de post (récupération article)
     *
     * @return void
     */
    public function editPostPage()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id'] and $infoUser['rank_id'] == 1) {

            $postManager = new PostManager;
            $post = $postManager->getPost($_GET['id']);
            require('Views/Backend/editPostView.php');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }

    /**
     * Supression d'un post
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

            $deleteCom->delPostCom($_GET['id']);
            $deletePost->deletePost($_GET['id']);
            header('Location: index.php?action=panelAdmin');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }

    /**
     * Redirection page ajout de billet
     *
     * @return void
     */
    public function postPage()
    {
        require('Views/Backend/addPostView.php');
    }
}