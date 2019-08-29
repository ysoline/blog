<?php $title ?>

<?php ob_start(); ?>

<a href="index.php" class="btn btn-outline-secondary btn-sm">Retour</a>

<div class="blog-post">
    <h2 class="blog-post-title text-center"><?= $post['title'] ?></h2>
    <p class="blog-post-meta text-muted"><?= $post['date_creation_fr'] ?></p>
    <p><?= $post['post'] ?></p>
</div>

<div>
    <h3 class="mt-5">Commentaires :</h3>

    <?php if (isset($_SESSION['id_user'])) { ?>
    <hr class="my-4">
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
        echo '<small class="text-danger">Vous devez être connecté pour ajouter un commentaire</small><hr class="my-4">';
    }

    ?>
</div>


<?php foreach ($comments as $comment) { ?>
<div class="border p-4 m-2 rounded">
    <div class="d-flex justify-content-between">
        <h6> par <?= strtoupper($getComAuthor['pseudo']) ?></h6>
        <small class="text-muted text-danger"><?= $comment['comment_date_fr'] ?></small>
    </div>

    <p class="lead pl-4"><?= $comment['comment'] ?></p>
    <div class="d-flex justify-content-between">
    <a class="btn btn-outline-danger" href='index.php?action=report&amp;id=<?= $comment['id']; ?>'>Signaler</a>
        <?php if (isset($_SESSION['id_user'])) {
                if ($_SESSION['id_user'] == $comment['id_user']) { ?>
        <a class="btn btn-outline-success" href="index.php?action=comment&amp;id=<?= $comment['id']; ?>">Modifier</a>
        <?php }
            }  ?>
        
    </div>
</div>

<?php
} ?>
<?php $content = ob_get_clean();
require('Views/Frontend/template.php');
?>