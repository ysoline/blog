<?php

class PostController

{
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        require('Views/Frontend/listPostView.php');
    }
    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        require('Views/Frontend/postView.php');
    }
    /**
     * Ajout de billet
     *
     * @return void
     */
    public function addPost($title, $post)
    {
<<<<<<< HEAD
        $addPost = new PostManager;
        $addPost->addPost($_POST['title'], $_POST['post']);
=======
        if (isset($_SESSION['pseudo'])) {
            $postManager = new PostManager;
            $postManager->add($_POST['title'], $_POST['content']);
        }
>>>>>>> origin/adminPanel
    }
    // public function editPost()
    // {

    //     if (isset($_SESSION['pseudo'])) { }
    // }
}