<?php

try{
    if(isset($_GET['action']))
    {
        if(['action']== 'listPosts')
        {
            //affiche listPosts (demande au controller)
            listPosts();
        }
    }
    // else{
    //     listPosts();
    // }
}
catch(Exception $e){
    $errorMessage =$e->getMessage();
    require('view/frontend/errorView.php');
}
