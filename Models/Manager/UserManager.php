<?php

class UserManager extends Manager
{
    /**
     * Inscription
     * Rang par défault: 1=utilisateur
     * @param mixed $pseudo
     * @param mixed $pass
     * @param mixed $email
     * @return void
     */
    public function addUser($pseudo, $pass, $email)
    {
        $_bdd = $this->dbConnect();
        $reqUser = $_bdd->prepare('INSERT INTO users(pseudo, pass, email, rank_id) VALUES(?,?,?,1)');
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
     * Récupère info utilisateur
     *
     * @param mixed $id
     * @return void
     */
    public function getInfo($id)
    {

        $_bdd = $this->dbConnect();
        $userInfo = $_bdd->prepare('SELECT pseudo, email, rank_id FROM users WHERE id=' . $_SESSION['id_user']);
        $userInfo->execute(array($id));

        $userInfo->fetch(PDO::FETCH_ASSOC);
        return $userInfo;
    }

    /**
     * Edition du pseudo 
     *
     * @param mixed $pseudo
     * @return void
     */
    public function editProfil($id, $pseudo, $email)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare("UPDATE users SET pseudo= ?, email=? WHERE id= ?");
        $editProfil = $req->execute(array($pseudo, $email, $id));
        return $editProfil;
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