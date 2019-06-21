<?php

use \Julie\Blog\Model\Manager;

class CommentManager extends Manager
{
    public function getComments($postId) //Récupère un commentaire
    {
        $_bdd = $this->getDbConnect();
        $comments = $_bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)//Ajoute un commentaire
    {
        $_bdd= $this->getDbConnect();
        $comments=$_bdd->prepare('INSERT INTO comments(postID, author, comment, comment_date) VALUES(?,?,?, NOW())');
        $affectedLines = $comments-> execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($postId, $author, $comment)// Supprime un commentaire
    {
        $_bdd=$this->getDbConnect();
        $comments=$_bdd->exec('DELETE FROM comments WHERE postID=?, author=?, comment=?, comment_date=?');
    }

    public function editComment($commentId, $author, $comment)
    {
        $_bdd=$this->getDbConnect();
        $comment=$_bdd->prepare('UPDATE comments SET author =?, comment=?, commentId= ?');
        $updateComment = $comment-> execute(array($commentId, $author, $comment));

        return $updateComment;
    }
}