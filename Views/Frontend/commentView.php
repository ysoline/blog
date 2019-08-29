<?php $title ?>

<?php ob_start(); ?>

<a href="index.php?action=listPosts" class="btn btn-outline-secondary">Accueil</a>


<div class="jumbotron">
    <h6> par <?= $getAuthor['pseudo'] ?></h6>
    <p class="lead"><?= $comment['comment'] ?></p>
    <p><?= $comment['comment_date_fr'] ?></p>
</div>

<h3>Modification de commentaires :</h3>


<form action="index.php?action=editComment&amp;id=<?= $comment['id']; ?>" method="post">
    <div class='d-flex justify-content-center flex-column'>
        <h6 for="pseudo"><?= $_SESSION['pseudo'] ?></h6>
    </div>

    <div class='d-flex justify-content-center flex-column mt-2'>
        <label for="comment">Commentaire :</label><br />
        <textarea id="updateComment" name="updateComment" required><?= $comment['comment'] ?></textarea>
    </div>

    <div class="row justify-content-md-center mt-3 mb-2">
        <input class="btn btn-primary " type="submit" />
    </div>
</form>


<div class="card border-danger mb-3" style="max-width: 20rem;">
    <div class="card-header">Suppression du commentaire</div>
    <div class="card-body">
        <form action="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>" method="post">
            <label>Veuillez confirmer la suppression en écrivant "SUPPRIMER"</label>
            <input id="deleteCom" name="deleteCom" required><br />
            <small class='text-danger'>Attention, cette action est irréverssible </small><br />
            <input class='btn btn-outline-danger' type="submit" value="Supprimer">
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>