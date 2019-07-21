<?php

//fonctionnalités des commentaires 
//ajout/édition...
class CommentController

{
        public function addComment($post_id, $author, $comment)
    {
        $commentManager= new CommentManager();

        $affectedLines = $commentManager->postComment($_GET['post_id'], $_POST['author'], $_POST['comment']);

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

        require('Views\Frontend\commentViews.php');
    }

    public function editComment($commentId, $author, $comment, $post_id)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->editComment($_POST['author'], $_POST['comment'],$_GET['post_id']);
        if ($affectedLines === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $post_id);
        }
    }
}