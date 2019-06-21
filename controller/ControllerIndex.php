<?php

class ControllerIndex
{
    private $_postManager,
            $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) >1)
        {
          throw new Exception(('Page introuvable'));  
        }
        else{
            $this->posts();
        }        
    }

    private function posts()
    {
        $this->_postManager = new PostManager;
        $posts= $this-> _postManager->getPosts();

        require_once('view/frontend/listPostView.php');
    }

}