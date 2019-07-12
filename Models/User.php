<?php


class User{

    private $id,
            $pseudo,
            $pass,
            $email;

    public function id()
    {
        return $this->_id;
    }
    public function pseudo()
    {
        return $this->_pseudo();
    }
    public function pass()
    {
        return $this->_pass();
    }
  
    public function email()
    {
        return $this->_email();
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
            if(strlen($pseudo) > 5 && strlen($pseudo) < 12)
            {
                $this->_pseudo = $pseudo;
            }
            else {
                {
                    trigger_error('Le pseudo doit être compris entre 5 et 12 charactère', E_USER_WARNING);
            return;
                }
            }
        }
    }
    public function setPass($pass)
    {
        if(is_string($pass))
        {
            $this->_pass1=$pass;
        }
    }

    public function setEmail($email)
    {
        if(is_string($email))
        {
            $this->_email=$email;
        }
    }

}