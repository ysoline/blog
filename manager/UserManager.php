<?php

use \Julie\Blog;


require_once('model/Manager.php');

class User extends Manager{

    private $pseudo,
            $password,
            $password2,
            $email,
            $email2,
            $rank_id;

    private function createUser($pseudo, $password, $email, $rank_id) //ajouter un utilisateur lors de l'inscription
    {
        $db=$this->dbConnect();
        $reqUser= $db->prepare('INSERT INTO users(pseudo, password, password2, email, email2, rank_id) VALUES(?,?,?,?,?,?) ');
        $newUser = $reqUser -> execute(array($pseudo, $password, $email, $rank_id));

        return $newUser; 
    }

    private function getUser($pseudo, $password) //selectionner un utilisateur (verification) lors de la connexion
    {
        $db=$this->dbConnect();
        $req= $db->prepare('SELECT $pseudo, password FORM users WHERE pseudo=?, password=?');
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
}