<?php

//fonctionnalités des commentaires 
//ajout/édition...
class CommentController

{
        public function addComment($post_id, $author, $comment)
    {
        $commentManager= new CommentManager();

        $affectedLines = $commentManager->postComment($post_id, $author, $comment);

        if($affectedLines === false){
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }else{
            header('Location: index.php?action=post&id='.$post_id);
        }
    }

    public function updateComment($commentId)
    {
        $commentManager = new \Julie\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);

        require('view\frontend\commentView.php');
    }

    public function editComment($commentId, $author, $comment, $post_id)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->editComment($author, $comment, $commentId);
        if ($affectedLines === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $post_id);
        }
    }
}