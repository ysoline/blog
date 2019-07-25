<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// modification mot de passe, changement de pseudo, édition profil...
class UserController
{
    public function profilPage()//Redirection page connexion
    {
        require('Views/Frontend/profilView.php');
    }

    public function getId($id)
    {
        $getId = new Usermanager;
        $getId -> getId($id);

        return $getId;
    }
}
