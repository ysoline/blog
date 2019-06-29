<?php
 require ('Autoloader.php'); 
 Autoloader::register(); 



try{
    if(isset($_GET['action']))
    {
        if($_GET['action']== 'listPosts')
        {
            $posts= new PostController;
            $posts->listPosts();            
            
        }elseif($_GET['action'] == 'post')
        {
            if(isset($_GET['id']) && $_GET['id']>0)
            {
                $post =new PostController;
                $post ->post();
            }
            else{
                throw new Exception("Post introuvable !");                
            }} elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (isset($_POST['author'],$_POST['comment']) && !empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        $s_comment='<span style="green">Votre commentaire a bien été posté</span>';
                                        
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Post introuvable !');
                }
        }
    }
     else{
        $posts= new PostController;
        $posts ->listPosts();
     }
}
catch(Exception $e){
    $errorMessage =$e->getMessage();
    require('Views/Frontend/error.php');
}
