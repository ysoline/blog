<?php ob_start(); ?>
<div class="container-fluid">
    <div class="row">
        <div class='col-lg'>
            <div class='border border-secondary'>
                <h3> Gestion des billets </h3>

                <a type="button" href="index.php?action=postPage" class="btn btn-primary">Ajouter billet</a>

                <div class="jumbotron border border-secondary">
                    <h4>Liste des posts :</h4>

                    <?php foreach ($findPost as $post) { ?>

                    <h5><?= $post['title'] ?></h5>
                    <p class="lead"><?= substr($post['post'], 0, 75); ?>...</p>
                    <p class="lead d-flex justify-content-center">
                        <a class="btn btn-primary btn" href="index.php?action=post&amp;id=<?= $post['id']; ?>"
                            role="button">Lire la
                            suite</a>
                    </p>
                    <a class="btn btn-primary btn" href="index.php?action=editPostPage&amp;id=<?= $post['id']; ?>"
                        role="button">Modifier</a>

                    <?php } ?>

                </div>
            </div>
        </div>
        <div class='col'>
            <div class='border border-secondary'>
                <h3>Gestion des commentaires</h3>
                <h5>Commentaires signalés :</h5>

                <?php
                foreach ($getReport as $comment) {
                    if ($comment['report'] == 1) { ?>
                <div class="jumbotron">
                    <h6> par </h6>
                    <p class="lead"><?= $comment['comment'] ?></p>
                    <p><?= $comment['comment_date_fr'] ?></p>
                </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>