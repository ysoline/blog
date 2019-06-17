<?php
//Contient les requêtes SQL concernant les commentaires
//class comment
use \Julie\Blog;

require_once('model/Manager.php');

class CommentManager extends Manager
{
    public function getComments($postId) //Récupère un commentaire
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)//Ajoute un commentaire
    {
        $db= $this->dbConnect();
        $comments=$db->prepare('INSERT INTO comments(post_ID, author, comment, comment_date) VALUES(?,?,?, NOW())');
        $affectedLines = $comments-> execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($postId, $author, $comment)// Supprime un commentaire
    {
        $db=$this->dbConnect();
        $comments=$db->exec('DELETE FROM comments WHERE post_ID=?, author=?, comment=?, comment_date=?');
    }

    public function editComment($commentId, $author, $comment)
    {
        $db=$this->dbConnect();
        $comment=$db->prepare('UPDATE comments SET author =?, comment=?, commentId= ?');
        $updateComment = $comment-> execute(array($commentId, $author, $comment));

        return $updateComment;
    }
    }