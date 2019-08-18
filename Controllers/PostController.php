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
        $addPost = new PostManager;
        $addPost->addPost($_POST['title'], $_POST['post']);
    }
    // public function editPost()
    // {

    //     if (isset($_SESSION['pseudo'])) { }
    // }
}