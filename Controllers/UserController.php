<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// inscription/connexion... 
class UserController
{
    public function newUser($pseudo, $pass1, $pass2, $email, $email2)
    {
        $userManager = new UserManager;
        $newUser = $userManager -> addUser();
    }

    // public function getUser($pseudo, $pass1)
    // {
    //     $userManager = new UserManager;
    //     $user = $userManager->getUser($pseudo, $pass1);

    //     require('Views/Frontend/authView.php');
    // }

    // public function editUser($id)
    // {
    //     $userManager = new User;
    //     $editUser = $userManager->editUser($id);

    //     return $editUser;
    // }

    public function connectUser()
    {
        $coUser = new UserManager;
        $coUser -> getUser();

        require('Views/Frontend/authView.php');
    }

    public function connectPage()
    {
        require('Views/Frontend/authView.php');
    }
    public function suscribePage()
    {
        require('Views/Frontend/suscribeView.php');
    }
}
