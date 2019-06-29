<?php

class PostController

{    
    function listPosts()
    {
        $postManager= new PostManager(); 
        $posts= $postManager->getPosts(); 
        require('view/frontend/listPostView.php');
    }
    function post()
    {
        $postManager= new PostManager();
        $commentManager= new CommentManager();
        $post= $postManager-> getPost($_GET['id']);
        $comments= $commentManager-> getComments($_GET['id']);
        require('view/frontend/postView.php');
    }
}