<?php


class Comment
{
    private $_id,
            $_comment,
            $_author,
            $_comment_date,
            $_post_id,
            $_status;

    public function id()
    {
        return $this->_id();
    }
    public function comment()
    {
        return $this->_comment();
    }
    public function author()
    {
        return $this->_author();
    }
    public function comment_date()
    {
        return $this->_comment_date();
    }
    public function post_id()
    {
        return $this->_post_id();
    }
    // public function status()
    // {
    //     return $this->_status();
    // }

    public function setId($id)
    {
        $id= (int) $id;
        if($id > 0)
        {
            $this->_id=$id;
        }
    }
   public function setComment($comment)
    {
        if(is_string($comment))
        {
            $this->_comment=$comment;
        }
    }
    public function setAuthor($author)
    {
        $id_author =(int) $author;
        if($author >0)
        {
            $this->_author=$author;
        }
    }
    public function setComment_Date($comment_date)
    {
        $this->_comment_date=$comment_date;
    }
    public function setPost_id($post_id)
    {
        $post_id = (int) $post_id;
        if($post_id > 0)
        {
            $this->_post_id=$post_id;
        }
    }
    // public function setStatus($status)
    // {

    // }

}