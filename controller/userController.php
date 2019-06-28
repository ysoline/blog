<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// inscription/connexion... 
include('model/UserManager.php');

function newUser($pseudo, $pass1, $pass2, $email, $email2)
{
    $userManager= new User;
    $newUser= $userManager-> createUser($pseudo, $pass1, $pass2, $email, $email2);

    if ($newUser === false){
        throw new Exception('Inscription impossible');
    }
    else{
        echo 'Enregistré !';
    }
}