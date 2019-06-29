<?php


class User{

    private $id,
            $pseudo,
            $pass1,
            $pass2,
            $email,
            $email2;

    public function id()
    {
        return $this->_id;
    }
    public function pseudo()
    {
        return $this->_pseudo();
    }
    public function pass1()
    {
        return $this->_pass1();
    }
    public function pass2()
    {
        return $this->_pass2();
    }
    public function email()
    {
        return $this->_email();
    }
    public function email2()
    {
        return $this->_email2();
    }

    //SETTER

    public function setId($id)
    {
        $id =(int) $id;

        if($id > 0)
        {
            $this->_id =$id;
        }        
    }
    public function setPseudo($pseudo)
    {
        if(is_string($pseudo))
        {
            $this->_pseudo = $pseudo;
        }
    }
    public function setPass1($pass1)
    {
        if(is_string($pass1))
        {
            $this->_pass1=$pass1;
        }
    }
    public function setPass2($pass2)
    {
        if(is_string($pass2))
        {
            $this->_pass2=$pass2;
        }
    }
    public function setEmail($email)
    {
        if(is_string($email))
        {
            $this->_email=$email;
        }
    }
    public function setEmail2($email2)
    {
        $this->_email2=$email2;
    }
}