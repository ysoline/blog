<?php

class UserManager extends Manager
{
    /**
     * Inscription
     * Rang par défault: 2: membre
     * @param mixed $pseudo
     * @param mixed $pass
     * @param mixed $email
     * @return void
     */
    public function addUser($pseudo, $pass, $email)
    {
        $_bdd = $this->dbConnect();
        $reqUser = $_bdd->prepare('INSERT INTO users(pseudo, pass, email, rank_id) VALUES(?,?,?,2)');
        $newUser = $reqUser->execute(array($pseudo, $pass, $email));
        return $newUser;
    }

    /**
     * Récupère les infos utilisateur
     *
     * @param mixed $pseudo
     * @return void
     */
    public function getPseudo($pseudo)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));
        $userInfo = $req->fetch();
        return $userInfo;
    }


    /**
     * Récupère l'email d'un utilisateur
     *
     * @param mixed $email
     * @return void
     */
    public function getMail($email)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT email FROM users WHERE email=:email');
        $req->execute(array('email' => $email));
        $userMail = $req->fetch();
        return $userMail;
    }

    /**
     * Récupère info utilisateur grâce à son id
     *
     * @param mixed $id
     * @return void
     */
    public function getInfo($id)
    {

        $_bdd = $this->dbConnect();
        $info = $_bdd->prepare('SELECT * FROM users WHERE id=?');
        $info->execute(array($id));
        $userInfo = $info->fetch();

        return $userInfo;
    }

    /**
     * Edition du pseudo 
     *
     * @param mixed $pseudo
     * @return void
     */
    public function editPseudo($id, $pseudo)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare("UPDATE users SET pseudo= ? WHERE id= ?");
        $editPseudo = $req->execute(array($pseudo, $id));
        return $editPseudo;
    }

/**
     * Edition du mail 
     *
     * @param mixed $mail
     * @return void
     */
    public function editMail($id, $email)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare("UPDATE users SET email=? WHERE id= ?");
        $editMail = $req->execute(array($email, $id));
        return $editMail;
    }
    /**
     * Edition du pass
     *
     * @param mixed $pass
     * @return void
     */
    public function editPass($id, $pass)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE users SET pass =? WHERE id =?');
        $editPass = $req->execute(array($pass, $id));
        return $editPass;
    }


    /**
     * Suppression d'un compte utilisateur
     *
     * @param mixed $id_user
     * @return void
     */
    public function deleteUser($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('DELETE FROM users WHERE id =?');
        $deleteUser = $req->execute(array($id));

        return  $deleteUser;
    }
}
