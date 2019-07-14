<?php 
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié, changer mot de passe)

class Auth{
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
}