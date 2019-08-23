<?php

class PostController

{
    /**
     * Récupère tous les posts
     *
     * @return void
     */
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        require('Views/Frontend/listPostView.php');
    }
    /**
     * Récupère un post grace à son idée
     *
     * @return void
     */
    public function post()
    {
        $postManager = new PostManager;
        $commentManager = new CommentManager;
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        $getComAuthor = $commentManager->getCommentAuthor($_GET['id']);
        require('Views/Frontend/postView.php');
        return $comments;
        return $getComAuthor;
    }
    /**
     * Ajout de billet
     *
     * @return void
     */
    public function addPost($title, $post)
    {
        $addPost = new PostManager;
        $addPost->addPost($_POST['title'], $_POST['post']);
    }
    /**
     * Edition de post
     *
     * @return void
     */
    /**
     * eAction édition d'un post
     *
     * @return void
     */
    public function editPost()
    {
        $postManager = new PostManager;
        $editPost = $postManager->editPost($_GET['id'], $_POST['title'], $_POST['post']);
        header('Location: index.php?action=panelAdmin');
    }
    /**
     * Accès page d'édition de post
     *
     * @return void
     */
    public function editPostPage()
    {
        $postManager = new PostManager;
        $post = $postManager->getPost($_GET['id']);
        require('Views/Backend/editPostView.php');
        return $post;
    }

    /**
     * Supression d'un post
     *
     * @return void
     */
    public function deletePost()
    {
        $deletePost = new PostManager();
        $deletePost->deletePost($_GET['id']);
        header('Location: index.php?action=panelAdmin');
    }
}