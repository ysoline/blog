<?php

    require ('controller/postController.php');
    require ('controller/commentController.php');
    require ('view/frontend/indexView.php');
    //require ('controller/userController.php');

    try{
        if(isset($_GET['action'])){
            if($_GET['action']=='suscribe'){
                header('Location:view/frontend/souscribeView.php'); //inscription
            }
            if($GET['action'] == 'newUSer'){
                if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
                    
                }
            }
        }

    }
    catch(Exception $e) {
        $errorMessage =$e-> getMessage();
        require('view/frontend/errorView/php');
    }