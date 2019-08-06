<?php $title ?>

<?php ob_start(); ?>

<a href="index.php" class="btn btn-outline-secondary">Accueil</a>


<div class="jumbotron">
    <h6> par <?= $comment['pseudo'] ?></h6>
    <p class="lead"><?= $comment['comment'] ?></p>
    <p><?= $comment['comment_date_fr'] ?></p>
</div>

<h3>Modification de commentaires :</h3>


<form action="index.php?action=editComment&amp;id=<?= $comment['id']; ?>" method="post">
    <div class='d-flex justify-content-center flex-column'>
        <label for="pseudo"><?= $_SESSION['pseudo'] ?></label><br />
    </div>

    <div class='d-flex justify-content-center flex-column mt-2'>
        <label for="comment">Commentaire :</label><br />
        <textarea id="updateComment" name="updateComment" required></textarea>
    </div>

    <div class="row justify-content-md-center mt-3 mb-2">
        <input class="btn btn-primary " type="submit" />
    </div>
</form>

<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>