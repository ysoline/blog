<?php


class CommentManager extends Manager
{
    /**
     * Récupération de tous les commentaires
     *
     * @param mixed $post_id
     * @return void
     */
    public function getComments($post_id)
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('SELECT id, comment, id_user, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, pseudo FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($post_id));

        return $comments;
    }

    /**
     * Ajout de commentaire
     *
     * @param mixed $post_id
     * @param mixed $id_user
     * @param mixed $pseudo
     * @param mixed $comment
     * @return void
     */
    public function addComment($post_id, $id_user, $pseudo, $comment)
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('INSERT INTO comments(post_id, id_user, pseudo, comment, comment_date) VALUES(?,?,?,?, NOW())');
        $affectedLines = $comments->execute(array($post_id, $id_user, $pseudo, $comment));
        return $affectedLines;
    }

    /**
     * Suppression de commentaire
     *
     * @param mixed $postId
     * @param mixed $comment
     * @return void
     */
    public function deleteComment($id)
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('DELETE FROM comments WHERE id=?');
        $comments->execute(array($id));
    }

    /**
     * Edition commentaire
     *
     * @param mixed $commentId
     * @param mixed $pseudo
     * @param mixed $comment
     * @return void
     */
    public function editComment($comment, $id)
    {
        $_bdd = $this->dbConnect();
        $updateComment = $_bdd->prepare('UPDATE comments SET comment=?, comment_date = NOW() WHERE id=?');
        $updateComment->execute(array($comment, $id));

        return $updateComment;
    }

    /**
     * Récupération d'un commentaire
     *
     * @param mixed $id
     * @return void
     */
    public function getComment($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT id, comment, pseudo, id_user, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }
}
