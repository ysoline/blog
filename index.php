<?php

require('controller/postController.php');

try{
    if(isset($_GET['action']))
    {
        if($_GET['action']== 'listPosts')
        {
            //affiche listPosts (demande au controller)
            listPosts();
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
