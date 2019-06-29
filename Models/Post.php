<?php

    class Post
    {
        private $_id,
                $_title,
                $_post,
                $_postDate;
                

        //     //Constructeur
        // public function __construct(array $data)
        // {
        //     $this->hydrate($data);
        // }
        //     //Hydration
        // public function hydrate(array $data)
        // {
        //     foreach($data as $key => $value)
        //     {
        //         $method= 'set'.ucfirst($key);

        //         if(method_exists($this, $method))
        //         $this->$method($value);
        //     }
        // }

        //SETTERS

        public function setId($id)
        {
            $id = (int) $id;
            if($id >0)
            {
                $this->_id= $id;
            }
        }

        public function setTitle($title)
        {
            if(is_string($title))
            {
                $this->_title = $title;
            }
        }
        public function setContent($post)
        {
            if(is_string($post))
           { $this->_post = $post;
        }}
        public function setPostDate($postDate)
        {
           { $this->_date = $postDate;}
        }

        //GETTERS

        public function id()
        {
            return $this->_id;
        }
        public function title()
        {
            return $this->_title;
        }
        public function post()
        {
            return $this->_post;
        }
        public function postDate()
        {
            return $this->_postDate;
        }

    }