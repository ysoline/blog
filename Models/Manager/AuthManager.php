<?php

class AuthManager extends Manager
{

    public function logSession()
    {
        $Session = new Session();
    }

    public function addUser($pseudo, $pass, $email) //ajouter un utilisateur lors de l'inscription
    {
        $_bdd = $this->dbConnect();
        $reqUser = $_bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES(?,?,?)');
        $newUser = $reqUser->execute(array($pseudo, $pass, $email));

        return $newUser;
    }

    public function getPseudo($pseudo) //récupère les pseudos pour vérification lors de l'inscription et de la connexion
    {

        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT id, pseudo,pass FROM users WHERE pseudo=:pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $userPseudo = $req->fetch();

        return $userPseudo;
    }
    public function getMail($email) //récupère les pseudos pour vérification lors de l'inscription et de la connexion
    {

        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT id, email FROM users WHERE email=:email');
        $req->execute(array('email' => $email));
        $userMail = $req->fetch();

        return $userMail;
    }
}
