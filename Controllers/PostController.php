<?php

class PostController

{    
    function listPosts()
    {
        $postManager= new PostManager(); 
        $posts= $postManager->getPosts(); 
        require('Views/Frontend/listPostView.php');
    }
    function post()
    {
        $postManager= new PostManager();
        $commentManager= new CommentManager();
        $post= $postManager-> getPost($_GET['id']);
        $comments= $commentManager-> getComments($_GET['id']);
        require('Views/Frontend/postView.php');
    }
}