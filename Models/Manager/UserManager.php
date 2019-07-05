<?php

class UserManager extends Manager {

    public function addUser() //ajouter un utilisateur lors de l'inscription
    {
        $_bdd=$this->dbConnect();
        $reqUser= $_bdd->prepare('INSERT INTO users(pseudo, pass1, pass2, email, email2) VALUES(?,?,?,?,?) ');
        $newUser = $reqUser -> execute(array());

        return $newUser; 
    }

    public function getUser() //selectionner un utilisateur (verification) lors de la connexion
    {
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT $id, $pseudo, pass FROM users WHERE pseudo=?');
        
        $count = $req-> rowCount(); //Vérification de l'existence d'un pseudo;

        if($count == 1)
        {
            return $count;
        }
        else {
            throw new Exception("Identifiants inconnu");
            
        }         
     }

    // public function editUser($pseudo, $pass)
    // {
    //     $_bdd=$this->dbConnect();
    //     $data= $_bdd->prepare('UPDATE users set pseudo =?, pass=? WHERE id=?');
    //     $data->execute(array($pseudo, $pass));

    //     return $data;
    // }

    // public function deleteUser($pseudo, $password, $email)
    // {
    //     $_bdd=$this->dbConnect();
    //     $req= $_bdd->exec('DELETE FROM users WHERE pseudo=?, password=?, email=?');
    // }
}