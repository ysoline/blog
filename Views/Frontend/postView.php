<?php $title ?>

<?php ob_start(); ?>

<a href="index.php" class="btn btn-outline-secondary">Accueil</a>

<div class="jumbotron">
    <h1><?= $post['title'] ?></h1>
    <p class="lead"><?= $post['post'] ?></p>
    <hr class="my-4">
    <p><?= $post['date_creation_fr'] ?></p>

</div>

<h3>Commentaires :</h3>
<?php if (isset($_SESSION['pseudo'])) { ?>
    <h5>Ajouter un commentaire</h5>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div class='d-flex justify-content-center flex-column'>
            <h6 for="author"><?= $_SESSION['pseudo'] ?></h6><br />
        </div>

        <div class='d-flex justify-content-center flex-column mt-2'>
            <label for="comment">Commentaire :</label><br />
            <textarea id="comment" name="comment" required></textarea>
        </div>

        <div class="row justify-content-md-center mt-3 mb-2">
            <input class="btn btn-primary " type="submit" />
        </div>
    </form>
<?php } else {
    echo '<small>Vous devez être connecté pour ajouter un commentaire</small>';
}


foreach ($comments as $comment) { ?>
    <div class="jumbotron">
        <h6> par <?= $comment['pseudo'] ?></h6>
        <p class="lead"><?= $comment['comment'] ?></p>
        <p><?= $comment['comment_date_fr'] ?></p>


        <?php if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user'] == $comment['id_user']) { ?>
                <a class="btn btn-outline-secondary" href="index.php?action=comment&amp;id=<?= $comment['id']; ?>">Modifier</a>
            <?php } ?>
        </div>
    <?php
    }
} ?>
<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>