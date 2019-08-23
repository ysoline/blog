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
    public function addComment()
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->addComment($_GET['id'], $_SESSION['id_user'], $_POST['comment']);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $_GET['id']);
        }
    }

    /**
     * Edition de commentaire
     *
     * @param mixed $post_id
     * @param mixed $id_user
     * @return void
     */
    public function editComment()
    {
        $commentManager = new CommentManager;
        $checkIdUser = $commentManager->getComment($_GET['id']);

        if ($checkIdUser['id_user'] == $_SESSION['id_user']) {
            $editcomment = $commentManager->editComment($_POST['updateComment'], $_GET['id']);
            header('Location: index.php?action=listPosts');
        } else {
            throw new Exception("Vous n'avez l'autorisation de faire ceci");
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
        $getAuthor = $commentManager->getAuthor($_GET['id']);
        $comment = $commentManager->getComment($_GET['id']);
        require('Views/Frontend/commentView.php');
        return $getAuthor;
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

    /**
     * Suppression d'un commentaire
     *
     * @return void
     */
    public function deleteComment()
    {
        $deleteCom = new CommentManager();
        $deleteCom->deleteComment($_GET['id']);
        header('Location: index.php?action=listPosts');
    }
}
