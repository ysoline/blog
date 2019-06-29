<?php $title ?>

<?php ob_start(); ?>

<a href="index.php" class="btn btn-outline-secondary">Retour</a>

<div class="jumbotron">
    <h1><?= $post['title'] ?></h1>
    <p class="lead"><?= $post['post'] ?></p>
    <hr class="my-4">
    <p><?= $post['date_creation_fr'] ?></p>

</div>

<h3>Commentaires :</h3>

<h4>Ajouter un commentaire</h4>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >
        <div class='d-flex justify-content-center flex-column'>
            <label for="author">Pseudo :</label><br />
            <input type="text" id="author" name="author" />
        </div>
        
        <div class='d-flex justify-content-center flex-column mt-2'>
            <label for="comment">Commentaire :</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>

        <div class="row justify-content-md-center mt-3 mb-2">
            <input class="btn btn-primary " type="submit" />
        </div>
    </form>

<?php
foreach ($comments as $comment) { ?>
    <div class="jumbotron">
        <h6> par <?= $comment['author'] ?></h6>
        <p class="lead"><?= $comment['comment'] ?></p>
        <p><?= $comment['comment_date_fr'] ?></p>

    </div>
<?php
} ?>

<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>