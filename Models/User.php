<?php


class User{

    private $id,
            $pseudo,
            $pass,
            $email;

    public function __construct($id, $pseudo, $pass, $email)
    {
        $this->id=$id;
        $this ->pseudo =$pseudo;
        $this->pass=$pass;
        $this->email=$email;
    }
    private function hydrate($data)
    {
        foreach ($data as $key=>$value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

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
                $this->_pseudo = $pseudo;
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