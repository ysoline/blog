<?php

class PostManager extends Manager
{
    /**
     * Recuperation de tous les posts
     *
     * @return void
     */
    public function getPosts()
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT id, title, post, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS date_creation_fr FROM posts ORDER BY date_creation_fr');
        $req->execute();
        return $req;
    }
    /**
     * Recuperation d'un post par rapport à son id
     *
     * @param mixed $postId
     * @return void
     */
    public function getPost($postId) // Sélectionne un post 
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT id, title, post, DATE_FORMAT(postDate, \'%d/%m/%Y\') AS date_creation_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }
    /**
     * Edition d'un post
     *
     * @param mixed $postId
     * @return void
     */
    public function updatePost($id, $title, $post) // Editer un poste
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE posts SET title=?, post =? WHERE id=?');
        $updatePost = $req->execute(array($title, $post, $id));

        return $updatePost;
    }

    /**
     * Suppression d'un post
     *
     * @param mixed $postId
     * @return void
     */
    public function deletePost($id) //Supprimer un poste
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('DELETE FROM posts WHERE id= ?');
        $req->execute(array($id));
    }

    /**
     * Ajout de post
     *
     * @param mixed $title
     * @param mixed $post
     * @return void
     */
    public function addPost($title, $post)
    {
        $_bdd = $this->dbConnect();
        $addPost = $_bdd->prepare('INSERT INTO posts(title, post, postDate) VALUES(?,?, NOW())');
        $addPost->execute(array($title, $post));

        return $addPost;
    }
}