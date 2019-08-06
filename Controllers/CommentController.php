<?php

//fonctionnalités des commentaires 
//ajout/édition...
class CommentController

{
    /**
     * Ajout de commentaire
     *
     * @param mixed $post_id
     * @return void
     */
    public function addComment($post_id)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->addComment($post_id, $_SESSION['id_user'], $_SESSION['pseudo'], $_POST['comment']);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post_id);
        }
    }

    /**
     * Edition de commentaire
     *
     * @param mixed $post_id
     * @param mixed $id_user
     * @return void
     */
    public function editComment($id_user)
    {
        $commentManager = new CommentManager();
        $id_user->getComment($id_user);

        if ($_SESSION['id_user'] == $id_user) {
            $editcomment = $commentManager->editComment($_POST['updateComment'], $_GET['id']);

            header('Location: Views/Frontend/commentView.php');
        } else {
            throw new Exception('Vous n\'avez pas l\'autorisation de modifier ce commentaire');
        }
    }

    /**
     * Récupération d'un commentaire
     *
     * @param mixed $post_id
     * @param mixed $id
     * @param mixed $id_user
     * @return void
     */
    public function comment()
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->getComment($_GET['id']);
        require('Views/Frontend/commentView.php');
    }

    /**
     * Redirection vers page d'un commentaire pour édition de celui ci
     *
     * @return void
     */
    public function getCommentPage()
    {
        require('Views/Frontend/commentView.php');
    }
}