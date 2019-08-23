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
        $comments = $_bdd->prepare('SELECT id, comment, id_user, report, published, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
         FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
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
    public function addComment($post_id, $id_user, $comment)
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('INSERT INTO comments(post_id, id_user, comment, comment_date,report,published) VALUES(?,?,?, NOW(),0, 1)');
        $affectedLines = $comments->execute(array($post_id, $id_user, $comment));
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
        $req = $_bdd->prepare('SELECT id, comment, id_user, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }
    /**
     * Récupère l'autheur d'un commentaire (page d'édition commentaire)
     *
     * @param mixed $id
     * @return void
     */
    public function getAuthor($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT users.pseudo FROM users INNER JOIN comments ON users.id = comments.id_user WHERE comments.id = ?');
        $req->execute(array($id));
        $getAuthor = $req->fetch();

        return $getAuthor;
    }

    /**
     * getCommentAuthor
     *
     * @param mixed $id
     * @return void
     */
    public function getCommentAuthor($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT users.pseudo FROM users INNER JOIN comments ON users.id=comments.id_user WHERE comments.id IN(SELECT id FROM comments WHERE post_id =?)');
        $req->execute(array($id));
        $getComAuthor = $req->fetch();

        return $getComAuthor;
    }

    /**
     * Défini si un commentaire est publié ou non
     *
     * @param mixed $id
     * @return void
     */
    public function published($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE comments SET published = ? WHERE id = ?');
        $published = $req->execute(array($id));
        return $published;
    }
}