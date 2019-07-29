<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// modification mot de passe, changement de pseudo, édition profil...
class UserController
{
    public function profilPage() //Redirection page connexion
    {
        require('Views/Frontend/profilView.php');
    }

    /**
     * Edition du Pseudo
     *
     * @return void
     */
    public function editPseudo($pseudo)
    {
        $userManager = new UserManager;

        $changePseudo = $userManager->editPseudo($_POST['pseudo']);
    }

    /**
     * Edition du mot de passe
     *
     * @return void
     */
    public function editPass()
    {
        $userManager = new UserManager;
    }
    /**
     * Edition du mail
     *
     * @return void
     */
    public function editMail()
    {
        $userManager = new UserManager;
    }
}