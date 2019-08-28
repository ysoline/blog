<?php $title ?>

<?php ob_start(); ?>

<a href="index.php" class="btn btn-outline-secondary btn-sm">Accueil</a>

<div class="blog-post">
    <h2 class="blog-post-title"><?= $post['title'] ?></h2>
    <p class="blog-post-meta text-muted"><?= $post['date_creation_fr'] ?></p>
    <p><?= $post['post'] ?></p>    
</div>

<h3 class="mt-5">Commentaires :</h3>
<hr class="my-4">
<?php if (isset($_SESSION['id_user'])) { ?>
<h5 class="text-muted">Ajouter un commentaire</h5>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class='d-flex justify-content-center flex-column'>
        <h6 for="author"><?= strtoupper($_SESSION['pseudo']); ?></h6>
    </div>

    <div class='d-flex justify-content-center flex-column mt-2'>
        <label for="comment">Commentaire :</label><br />
        <textarea id="comment" name="comment" required></textarea>
    </div>

    <div class="row justify-content-md-center mt-3 mb-2">
        <input class="btn btn-sm btn-outline-primary" type="submit" />
    </div>
</form>
<?php } else {
    echo '<small>Vous devez être connecté pour ajouter un commentaire</small>';
}


foreach ($comments as $comment) {
    if ($comment['published'] == 1) { ?>
<div class="jumbotron">
    <h6> par <?= strtoupper($getComAuthor['pseudo']) ?></h6>
    <small class="text-muted"><?= $comment['comment_date_fr'] ?></small>
    <p class="lead"><?= $comment['comment'] ?></p>    

    <a class="btn btn-outline-danger" href='index.php?action=report&amp;id=<?= $comment['id']; ?>'>Signaler</a>
    <?php if (isset($_SESSION['id_user'])) {
                if ($_SESSION['id_user'] == $comment['id_user']) { ?>
    <a class="btn btn-outline-secondary" href="index.php?action=comment&amp;id=<?= $comment['id']; ?>">Modifier</a>
    <?php }  ?>
</div>
<?php
        }
    }
} ?>
<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>