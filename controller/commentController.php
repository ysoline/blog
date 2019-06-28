<?php

//fonctionnalités des commentaires 
//ajout/édition...

require_once('model/CommentManager.php');

function addComment($post_id, $author, $comment)
{
    $commentManager= new CommentManager();

    $affectedLines = $commentManager->postComment($post_id, $author, $comment);

    if($affectedLines === false){
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }else{
        header('Location: index.php?action=post&id='.$post_id);
    }
}

function updateComment($commentId)
{
    $commentManager = new \Julie\Blog\Model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);

    require('view\frontend\commentView.php');
}

function editComment($commentId, $author, $comment, $post_id)
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