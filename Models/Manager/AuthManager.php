<?php

class AuthManager extends Manager{
    
    public function addUser($pseudo, $pass, $email) //ajouter un utilisateur lors de l'inscription
    {
        $newUser=[];
        $pass_hach=password_hash($pass, PASSWORD_DEFAULT);

        $_bdd=$this->dbConnect();
        $reqUser= $_bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES(:pseudo,:pass,:email)');
        $newUser = $reqUser -> execute(array(
            'pseudo'=>$pseudo, 
            'pass'=>$pass_hach, 
            'email'=>$email));

        return $newUser; 
    }

    public function getUser($pseudo, $pass) //selectionner un utilisateur (verification) lors de la connexion
    {
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT id, pseudo, pass FROM users WHERE pseudo=?');        
        $checkpseudo = $req->fetch();       

        if($_POST['pseudo'] == $checkpseudo['pseudo'])
        {
            throw new Exception('Pseudo déjà utilisé');
        }
        else {
            return $checkpseudo;
        }
     }
    
     public function getPass($pass)//Récupère le mot de passe
     {
        $_bdd=$this->dbConnect();
        $req= $_bdd->prepare('SELECT id, pseudo, pass FROM users WHERE pass=?');    

        $checkpass= $req ->execute($pass);
        return $checkpass;
     }
}