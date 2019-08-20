<?php

class AdminController
{

    public function getPost()
    {
        $postManager = new PostManager;
        $findPost = $postManager->getPosts();

        require('Views/Backend/panelAdminView.php');
    }
}