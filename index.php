<?php
require 'Autoloader.php'; 
Autoloader::register(); 

include('controller/PostController.php');

try{
    if(isset($_GET['action']))
    {
        if($_GET['action']== 'listPosts')
        {
            //affiche listPosts (demande au controller)
            listPosts();
        }elseif($_GET['action'] == 'post')
        {
            if(isset($_GET['id']) && $_GET['id']>0)
            {
                post();
            }
            else{
                throw new Exception("Post introuvable !");                
            }
        }
    }
     else{
        listPosts();
     }
}
catch(Exception $e){
    $errorMessage =$e->getMessage();
    require('view/frontend/errorView.php');
}
