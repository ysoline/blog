<?php

use \Julie\Blog;
namespace Julie\Blog\Model;

require_once('model/Manager.php');

class UserManager extends Manager{

    public function createUser($pseudo, $pass1, $pass2, $email, $email2) //ajouter un utilisateur lors de l'inscription
    {
        $db=$this->dbConnect();
        $reqUser= $db->prepare('INSERT INTO users(pseudo, pass1, pass2, email, email2) VALUES(?,?,?,?,?) ');
        $newUser = $reqUser -> execute(array($pseudo, $pass1, $pass2, $email, $email2));

        return $newUser; 
    }


    public function getUser($pseudo, $password) //selectionner un utilisateur (verification) lors de la connexion
    {
        $db=$this->dbConnect();
        $req= $db->prepare('SELECT $id, $pseudo, password FROM users WHERE pseudo=?');
        $user=$req->execute(array($pseudo, $password));

        return $user;
    }

    private function editUser($pseudo, $password)
    {
        $db=$this->dbConnect();
        $data= $db->prepare('UPDATE users set pseudo =?, password=? WHERE id=?');
        $data->execute(array($pseudo, $password));

        return $data;
    }

    private function deleteUser($pseudo, $password, $email)
    {
        $db=$this->dbConnect();
        $req= $db->exec('DELETE FROM users WHERE pseudo=?, password=?, email=?');
    }
}