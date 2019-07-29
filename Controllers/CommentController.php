<?php

//fonctionnalités des commentaires 
//ajout/édition...
class CommentController

{
    public function addComment($post_id)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->addComment($post_id, $_SESSION['user_id'], $_SESSION['pseudo'], $_POST['comment']);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post_id);
        }
    }

    public function editComment($post_id, $id_user)
    {

        if (isset($_SESSION['pseudo'])) {
            $commentManager = new CommentManager();
            $editcomment = $commentManager->editComment($_SESSION['pseudo'], $_SESSION['user_id'], $_POST['comment'], $_GET['post_id']);

            if ($_SESSION['id_user'] = $editcomment['id_user']) { }
        }
    }
}