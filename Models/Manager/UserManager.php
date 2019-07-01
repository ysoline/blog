<?php

class UserManager extends Manager {

    public function addUser() //ajouter un utilisateur lors de l'inscription
    {
        $_bdd=$this->dbConnect();
        $reqUser= $_bdd->prepare('INSERT INTO users(pseudo, pass1, pass2, email, email2) VALUES(?,?,?,?,?) ');
        $newUser = $reqUser -> execute(array());

        return $newUser; 
    }

    public function pseudoExist($pseudo)
    {
        $_bdd=$this->dbConnect();
        $pseudoExist = $_bdd->prepare('SELECT pseudo FROM users WHERE pseudo=?');
        $pseudoExist->execute(array($pseudo));

        return $pseudoExist;
    }

    public function getUser($pseudo, $password) //selectionner un utilisateur (verification) lors de la connexion
    {
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT $id, $pseudo, password FROM users WHERE pseudo=?');
        $user=$req->execute(array($pseudo, $password));

        return $user;
    }

    private function editUser($pseudo, $password)
    {
        $_bdd=$this->dbConnect();
        $data= $_bdd->prepare('UPDATE users set pseudo =?, password=? WHERE id=?');
        $data->execute(array($pseudo, $password));

        return $data;
    }

    // private function deleteUser($pseudo, $password, $email)
    // {
    //     $_bdd=$this->dbConnect();
    //     $req= $_bdd->exec('DELETE FROM users WHERE pseudo=?, password=?, email=?');
    // }
}