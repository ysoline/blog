<?php ob_start(); ?>

<a type="button" href="index.php?action=postPage" class="btn btn-primary">Ajouter billet</a>

<div class="jumbotron border border-secondary">
    <h5>Liste des posts :</h5>
    <?php foreach ($findPost as $post) { ?>

    <h2><?= $post['title'] ?></h2>
    <p class="lead"><?= substr($post['post'], 0, 75); ?>...</p>
    <p class="lead d-flex justify-content-center">
        <a class="btn btn-primary btn" href="index.php?action=post&amp;id=<?= $post['id']; ?>" role="button">Lire la
            suite</a>
    </p>
    <a class="btn btn-primary btn" href="index.php?action=editPostPage&amp;id=<?= $post['id']; ?>"
        role="button">Modifier</a>

    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>