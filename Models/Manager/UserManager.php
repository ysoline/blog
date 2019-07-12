<?php

class UserManager extends Manager {

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