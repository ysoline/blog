<?php

//regroupe les fonctionnalités lié aux utillisateurs 
// inscription/connexion... 
class UserController
{
    public function newUser($pseudo, $pass1, $pass2, $email, $email2)
    {
        $userManager = new User;

        $pseudolenght = strlen($pseudo);
        if ($pseudolenght < 5 || $pseudolenght > 15) {
            $pseudo->pseudoExist();
            if ($pseudo == 0) {
                if ($pass1 == $pass2) {
                    $pass = password_hash($pass1, PASSWORD_DEFAULT);
                    if (
                        $email == $email2
                    ) {
                        $newUser = $userManager->createUser($pseudo, $pass, $email);
                    } else {
                        throw new Exception("Les emails ne sont pas identiques");;
                    }
                } else {
                    throw new Exception('Les mots de passes ne sont pas identiques');
                }
            } else {
                throw new Exception('Le pseudo existe déjà');
            }
        } else {
            throw new Exception("La longueur du pseudo doit être comprise entre 5 et 15 caractères");
        }
    }

    public function getUser($id)
    {
        $userManager = new User;
        $user = $userManager->getUser($id);

        return $user;
    }

    public function editUser($id)
    {
        $userManager = new User;
        $editUser = $userManager->editUser($id);

        return $editUser;
    }
}
