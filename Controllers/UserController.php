<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// modification mot de passe, changement de pseudo, édition profil...
class UserController
{
    public function profilPage()
    {
        $user = new UserManager;
        $getUser = $user->getInfo($_SESSION['id_user']);
        require('Views/Frontend/profilVIew.php');
        return $getUser;
    }

    /**
     * Edition du Pseudo
     *
     * @return void
     */
    public function editProfil()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id']) {
            $changePseudo = $userManager->editProfil($_SESSION['id_user'], $_POST['pseudo'], $_POST['email']);
            header('Location: index.php?action=profil');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }

    /**
     * Edition du mot de passe
     *
     * @return void
     */
    public function editPass()
    {
        $userManager = new UserManager;

        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id']) {
            if ($_POST['pass'] == $_POST['pass2']) {
                $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $changePseudo = $userManager->editPass($_GET['id'], $_POST['pass']);
                header('Location: index.php?action=profil');
            } else {
                throw new Exception('Les mots de passe ne sont pas identiques <br/><a href="index.php?action=profil">Retour</a>');
            }
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
    /**
     * Suppression d'un compte utilisateur
     *
     * @return void
     */
    public function deleteUser()
    {
        $userManager = new UserManager;
        $infoUser = $userManager->getInfo($_SESSION['id_user']);
        if ($_SESSION['id_user'] == $infoUser['id']) {
            $deleteUser = $userManager->deleteUser($_SESSION['id_user']);
            header('Location: index.php?action=profil');
        } else {
            throw new Exception('Vous n\'êtes pas autorisé à faire cela');
        }
    }
}
