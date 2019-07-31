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
    public function editProfil($id, $pseudo, $email)
    {
        $id = $_SESSION['id_user'];

        $userEdit = new UserManager;
        $changePseudo = $userEdit->editProfil($id, $pseudo, $email);
        header('Location: index.php?action=profil');
    }

    /**
     * Edition du mot de passe
     *
     * @return void
     */
    public function editPass($id, $pass)
    {
        $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $userEdit = new UserManager;
        $changePseudo = $userEdit->editPass($id, $_POST['pass']);
        header('Location: index.php?action=profil');
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
