<?php

class AuthManager extends Manager{
    
    public function addUser($pseudo, $pass, $email) //ajouter un utilisateur lors de l'inscription
    {
        $_bdd=$this->dbConnect();
        $reqUser= $_bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES(?,?,?)');
        $newUser = $reqUser -> execute(array($pseudo,$pass,$email));

        return $newUser; 
    }

    public function checkUser($pseudo) //selectionner un utilisateur (verification) lors de la connexion
    {
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT id, pseudo, pass FROM users WHERE pseudo=:pseudo');
        $req->execute(array('pseudo' => $pseudo));
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $user = new User($data);
        }
        return $user;
    }
    
     public function checkPass($pass)//Récupère le mot de passe
     {
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT id, pseudo, pass FROM users WHERE pass=?');    

        $checkpass= $req ->execute(array($pass));
        return $checkpass;
     }
}