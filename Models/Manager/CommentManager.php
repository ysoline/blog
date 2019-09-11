<?php

namespace Models\Manager;

class CommentManager extends \Manager
{
    /**
     * Recuperation de tous les commentaires
     *
     * @param mixed $post_id
     * @return void
     */
    public function getComments($post_id)
    {
        $_bdd = $this->dbConnect();
        $comments = $_bdd->prepare('SELECT comments.*, users.pseudo,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments INNER JOIN posts ON comments.post_id = posts.id INNER JOIN users ON users.id = comments.id_user WHERE posts.id = ? AND published = 1 ORDER BY comment_date DESC');
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
    public function updateComment($comment, $id)
    {
        $_bdd = $this->dbConnect();
        $updateComment = $_bdd->prepare('UPDATE comments SET comment=?, comment_date = NOW() WHERE id=?');
        $updateComment->execute(array($comment, $id));

        return $updateComment;
    }

    /**
     * Recuperation d'un commentaire
     *
     * @param mixed $id
     * @return void
     */
    public function getComment($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT id, comment, id_user, published,report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }
    /**
     * Recupere l'autheur d'un commentaire (page d'édition commentaire)[un seul commentaire]
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
     * Re publie un commentaire (administrateur)
     *
     * @param mixed $id
     * @return void
     */
    public function published($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE comments SET published = 1 WHERE id = ?');
        $published = $req->execute(array($id));
        return $published;
    }
    /**
     * Ne publie plus un commentaire (administrateur)
     *
     * @param mixed $id
     * @return void
     */
    public function unpublished($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE comments SET published = 0 WHERE id = ?');
        $unpublished = $req->execute(array($id));
        return $unpublished;
    }

    /**
     * Signalement d'un commentaire (tous le monde)
     *
     * @param mixed $id
     * @return void
     */
    public function reportComment($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE comments SET report = 1 WHERE id =?');
        $report = $req->execute(array($id));
        return $report;
    }

    /**
     * Reset un report de commentaire
     *
     * @param mixed $id
     * @return void
     */
    public function resetReport($id)
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('UPDATE comments SET report =0 WHERE id= ?');
        $resetReport = $req->execute(array($id));
        return $resetReport;
    }

    /**
     * Selectionne tous les commentaires
     *
     * @return void
     */
    public function getReport()
    {
        $_bdd = $this->dbConnect();
        $req = $_bdd->prepare('SELECT comments.id AS c_id, comments.comment, comments.id_user,comments.report, comments.published, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, users.id AS u_id, users.pseudo FROM users INNER JOIN comments ON users.id=comments.id_user WHERE report =1 AND published = 1 ORDER BY comment_date DESC');
        $req->execute();

        return $req;
    }

    public function getUnpublished()
    {
        $_bdd = $this->dbConnect();
        $unpublished = $_bdd->prepare('SELECT comments.id AS c_id, comments.comment, comments.id_user,comments.report, comments.published, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, users.id AS u_id, users.pseudo FROM users INNER JOIN comments ON users.id=comments.id_user WHERE  published = 0 ORDER BY comment_date DESC');
        $unpublished->execute();

        return $unpublished;
    }

    public function delPostCom($post_id)
    {
        $_bdd = $this->dbConnect();
        $deletePostCom = $_bdd->prepare('DELETE FROM comments WHERE post_id = ?');
        $deletePostCom->execute(array($post_id));
    }
}