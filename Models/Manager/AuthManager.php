<?php

class AuthManager extends Manager{
    
    public function addUser($pseudo, $pass, $email) //ajouter un utilisateur lors de l'inscription
    {
        $_bdd=$this->dbConnect();
        $reqUser= $_bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES(?,?,?)');
        $newUser = $reqUser -> execute(array($pseudo,$pass,$email));

        return $newUser; 
    }

    public function connect($pseudo) //selectionner un utilisateur (verification) lors de la connexion
    {
        
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT id, pseudo, pass,email FROM users WHERE pseudo=:pseudo');
        $req->execute(array('pseudo' => $pseudo));
       $user = $req->fetch();

       return new User($user['id'], $user['pseudo'], $user['pass'], $user['email']);
    }
}