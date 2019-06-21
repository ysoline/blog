<?php

namespace Julie\Blog\Model;
use \Julie\Blog;

require_once('Manager.php');

class PostManager extends Manager
{

    public function getPosts() //Sélectionne TOUS les postes
    {        
        return $this->getAll('posts','Post');

    }

    public function getPost($postId)// Sélectionne un post 
    {
       
        $req = $db->prepare('SELECT id, title, post-content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    // public function editPost($postId)// Editer un poste
    // {
    //     $db = $this->dbConnect();
    //     $req = $db->prepare('UPDATE posts SET title=?, content =?');
    //     $req->execute(array($postId));
        
    //     return $editPost;
    // }

    // public function deletePost($postId) //Supprimer un poste
    // {
    //     $db = $this->dbConnect();
    //     $req = $db->exec('DELETE FROM posts WHERE postId=?, author=?, content=?, post_date=?');
    
    // }

}