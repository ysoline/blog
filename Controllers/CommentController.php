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
        $commentManager = new CommentManager;
        $affectedLines = $commentManager->addComment($_GET['id'], $_SESSION['id_user'], htmlspecialchars($_POST['comment']));

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
            $editcomment = $commentManager->editComment(htmlspecialchars($_POST['updateComment']), $_GET['id']);
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
        $commentManager = new CommentManager;
        $getAuthor = $commentManager->getAuthor($_GET['id']);
        $comment = $commentManager->getComment($_GET['id']);
        if ($comment['published'] == 1) {
            require('Views/Frontend/commentView.php');
            return $getAuthor;
        } else {
            throw new Exception('Aucun commentaire trouvé');
        }
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
        $deleteCom = new CommentManager;
        $deleteCom->deleteComment($_GET['id']);
        header('Location: index.php?action=listPosts');
    }

    /**
     * Signalement d'un commentaire
     *
     * @return void
     */
    public function reportComment()
    {
        $commentManager = new CommentManager;
        $getComment = $commentManager->getComment($_GET['id']);
        if ($getComment['report'] == 0) {
            $reportCom = $commentManager->reportComment($_GET['id']);
            header('Location: index.php?action=listPosts');
        } else {
            throw new Exception('Commentaire déjà signalé');
        }
    }

    /**
     * N'affiche plus un commentaire 
     *
     * @return void
     */
    public function unpublished()
    {
        $commentManager = new CommentManager;
        $unpublished = $commentManager->unpublished($_GET['id']);
    }

    /**
     * Reset le signalement d'un commentaire
     *
     * @return void
     */
    public function resetReport()
    {
        $commentManager = new CommentManager;
        $resetReport = $commentManager->resetReport($_GET['id']);
    }

    public function getReport()
    {
        $commentManager = new CommentManager;
        $getReport = $commentManager->getReport();
        require('Views/Backend/panelAdminView.php');
    }
}