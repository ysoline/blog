<?php


class CommentManager extends Manager
{
    public function getComments($postId) //Récupère un commentaire
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('SELECT id, comment, id_user, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($post_id, $comment) //Ajoute un commentaire
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('INSERT INTO comments(post_id, comment, id_user, comment_date) VALUES(?,?,?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $comment));

        return $affectedLines;
    }

    public function deleteComment($postId, $comment) // Supprime un commentaire
    {
        $_bdd = $this->dConnect();
        $comments = $_bdd->exec('DELETE FROM comments, id_user WHERE postID=?, comment=?, comment_date=?');
    }

    public function editComment($commentId, $author, $comment)
    {
        $_bdd = $this->dbConnect();
        $comment = $_bdd->prepare('UPDATE comments SET comment=?, commentId= ?');
        $updateComment = $comment->execute(array($commentId, $comment));

        return $updateComment;
    }
}