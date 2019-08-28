<?php ob_start(); ?>

<div class="row mb-2">
    <div class="col-lg-10 m-auto">
        <?php foreach ($posts as $post) { ?>
        <div class='row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative justify-content-center'>
            <h2 class='d-inline-block mb-2 text-secondary'><?= $post['title'] ?></h2>
            <p class="card-text mb-auto"><?= substr($post['post'], 0, 150); ?>...</p>
            <div class="lead d-flex justify-content-center">
                <a class="btn btn-sm btn-outline-primary mb-1" href="index.php?action=post&amp;id=<?= $post['id']; ?>" role="button">Lire la suite</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
$posts->closeCursor();
$content = ob_get_clean();
require('Views/Frontend/template.php');
?>