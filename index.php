<?php

    require ('controller/postController.php');
    require ('controller/commentController.php');
    require ('view/frontend/souscribeView.php');   
    //require ('controller/userController.php');

    try{
        

    }
    catch(Exception $e) {
        $errorMessage =$e-> getMessage();
        require('view/frontend/errorView/php');
    }