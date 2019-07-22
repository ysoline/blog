<?php

class PostController

{    
    public function listPosts()
    {
        $postManager= new PostManager(); 
        $posts= $postManager->getPosts(); 
        require('Views/Frontend/listPostView.php');
    }
    public function post()
    {
        $postManager= new PostManager();
        $commentManager= new CommentManager();
        $post= $postManager-> getPost($_GET['id']);
        $comments= $commentManager-> getComments($_GET['id']);
        require('Views/Frontend/postView.php');
    }
    public function addPost()
    {
        if(isset($_SESSION['pseudo']))
        {
            $postManager = new PostManager;
            $postManager->add($_POST['title'], $_POST['content']);
        }
    }
}