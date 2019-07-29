<?php

class AuthManager extends Manager
{

    /**
     * Inscription
     *
     * @param mixed $pseudo
     * @param mixed $pass
     * @param mixed $email
     * @return void
     */
    public function addUser($pseudo, $pass, $email)
    {
        $_bdd = $this->dbConnect();
        $reqUser = $_bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES(?,?,?)');
        $newUser = $reqUser->execute(array($pseudo, $pass, $email));
        return $newUser;
    }

    /**
     * Récupère les infos utilisateur
     *
     * @param mixed $pseudo
     * @return void
     */
    public function getInfo($pseudo)
    {
        $user = [];
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
}
