<?php

require_once('model/PostManager.php'); 
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager= new \Julie\Blog\Model\PostManager(); 
    $posts= $postManager->getPosts(); 

    require('view/frontend/listPostView.php');
}

function post()
{
    $postManager= new \Julie\Blog\Model\PostManager();
    $commentManager= new \Julie\Blog\Model\CommentManager();

    $post= $postManager-> getPost($_GET['id']);
    $comments= $commentManager-> getComments($_GET['id']);

    require('view/frontend/postView.php');
}