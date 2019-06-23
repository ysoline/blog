<?php

use Julie\Blog\Model\Manager;


class PostManager extends Manager
{

    public function getPosts() //Sélectionne TOUS les postes
    {        
        $_bdd=$this->dbConnect();
        $req = $_bdd->prepare('SELECT id, title, post, DATE_FORMAT(postDate, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts');

        $datas=$req->fetchAll(PDO::FETCH_ASSOC);

        return $datas;
    }

    public function getPost($postId)// Sélectionne un post 
    {
        $_bdd=$this->dbConnect();
        $req = $_bdd->prepare('SELECT id, title, post, DATE_FORMAT(postDate, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    public function editPost($postId)// Editer un poste
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE posts SET title=?, content =?');
        $editPost=$req->execute(array($postId));
        
        return $editPost;
    }

    public function deletePost($postId) //Supprimer un poste
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->exec('DELETE FROM posts WHERE postId=?, author=?, content=?, post_date=?');
    
    }

}