<?php

class UserManager extends Manager {

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
    public function getId($id)
    {
        $_bdd=$this->dbConnect();
        $req = $_bdd-> prepare('SELECT id FROM users WHERE id=?');
        $idUser = $req->execute($id);

        return $idUser;
    }
}