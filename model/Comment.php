<?php
namespace Julie\Blog\Model;

class Comment
{
    private $_id,
            $_title,
            $_comment,
            $_id_author,
            $_comment_date,
            $_post_id,
            $_status;

    public function id()
    {
        return $this->_id();
    }
    public function title()
    {
        return $this->_title();
    }
    public function comment()
    {
        return $this->_comment();
    }
    public function id_author()
    {
        return $this->_id_author();
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
    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->_title=$title;
        }
    }
    public function setComment($comment)
    {
        if(is_string($comment))
        {
            $this->_comment=$comment;
        }
    }
    public function setId_Author($id_author)
    {
        $id_author =(int) $id_author;
        if($id_author >0)
        {
            $this->_id_author=$id_author;
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