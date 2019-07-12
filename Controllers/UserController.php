<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// inscription/connexion... 
class UserController
{
    public function newUser($pseudo, $pass, $email)
    {
        $userManager = new UserManager;
        $newUser = $userManager -> addUser($pseudo, $pass, $email);

        header('Location: index.php?action=listPosts');
    }

    // public function editUser($id)
    // {
    //     $userManager = new User;
    //     $editUser = $userManager->editUser($id);

    //     return $editUser;
    // }

    public function connectUser($pseudo, $pass)
    {
        $coUser = new UserManager;
        $coUser -> getUser($pseudo, $pass);
       
        header('Location: index.php?action=listPosts');
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
