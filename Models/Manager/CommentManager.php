<?php


class CommentManager extends Manager
{
    public function getComments($post_id) //Récupère un commentaire
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('SELECT id, comment, id_user, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, pseudo FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($post_id));

        return $comments;
    }

    public function addComment($post_id, $id_user, $pseudo, $comment) //Ajoute un commentaire
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('INSERT INTO comments(post_id, id_user, pseudo, comment, comment_date) VALUES(?,?,?,?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $id_user, $pseudo, $comment));
        return $affectedLines;
    }

    public function deleteComment($postId, $comment) // Supprime un commentaire
    {
        $_bdd = $this->dConnect();
        $comments = $_bdd->exec('DELETE FROM comments, id_user WHERE postID=?, comment=?, comment_date=?');
    }

    public function editComment($commentId, $pseudo, $comment)
    {
        $_bdd = $this->dbConnect();
        $comment = $_bdd->prepare('UPDATE comments SET comment=?, commentId= ?');
        $updateComment = $comment->execute(array($commentId, $comment, $pseudo));

        return $updateComment;
    }
}