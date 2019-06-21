<?php

use \Julie\Blog\Model\Manager;

class UserManager extends Manager{

    public function createUser($pseudo, $pass1, $pass2, $email, $email2) //ajouter un utilisateur lors de l'inscription
    {
        $_bdd=$this->getDbConnect();
        $reqUser= $_bdd->prepare('INSERT INTO users(pseudo, pass1, pass2, email, email2) VALUES(?,?,?,?,?) ');
        $newUser = $reqUser -> execute(array($pseudo, $pass1, $pass2, $email, $email2));

        return $newUser; 
    }


    public function getUser($pseudo, $password) //selectionner un utilisateur (verification) lors de la connexion
    {
        $_bdd=$this->getDbConnect();
        $req= $_bdd->prepare('SELECT $id, $pseudo, password FROM users WHERE pseudo=?');
        $user=$req->execute(array($pseudo, $password));

        return $user;
    }

    private function editUser($pseudo, $password)
    {
        $_bdd=$this->getDbConnect();
        $data= $_bdd->prepare('UPDATE users set pseudo =?, password=? WHERE id=?');
        $data->execute(array($pseudo, $password));

        return $data;
    }

    private function deleteUser($pseudo, $password, $email)
    {
        $_bdd=$this->getDbConnect();
        $req= $_bdd->exec('DELETE FROM users WHERE pseudo=?, password=?, email=?');
    }
}