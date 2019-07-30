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
    public function editPseudo()
    {
        $id = $_SESSION['id_user'];
        $userEdit = new UserManager;
        $changePseudo = $userEdit->editPseudo($id, $_POST['pseudo']);
        echo ('ok');
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