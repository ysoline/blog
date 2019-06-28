<?php
require 'Autoloader.php'; 
Autoloader::register(); 

include('controller/postController.php');
include('controller/commentController.php');

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
            }} elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Post introuvable !');
                }
        }
    }
     else{
        listPosts();
     }
}
catch(Exception $e){
    $errorMessage =$e->getMessage();
    require('view/frontend/error.php');
}
