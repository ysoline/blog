<?php

class UserManager extends Manager
{


    /**
     * Edition du pseudo 
     *
     * @param mixed $pseudo
     * @return void
     */
    public function editPseudo($pseudo)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE users SET pseudo= ? WHERE id_user = ?');
        $editPseudo = $req->execute();
        return $editPseudo;
    }

    /**
     * Edition du pass
     *
     * @param mixed $pass
     * @return void
     */
    public function editPass($pass)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE users SET pass =? WHERE id_user =?');
        $req->execute(array('pass => $pass'));

        $editPass = $req->fetch();
        return $editPass;
    }

    public function deleteUser($id_user)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('DELETE FROM users WHERE id_user =?');
        $deleteUser = $req->execute(array('id_user => id_user'));

        return  $deleteUser;
    }
}