<?php ob_start(); ?>

<div class="row mb-2">
    <div class="col-lg-10 m-auto">
        <?php foreach ($posts as $post) { ?>
        <div class='border rounded overflow-hidden mb-4 shadow-sm h-md-250 justify-content-center p-3'>
            <div class="flex-nowrap text-center">
                <h2 class='d-inline-block mb-2 text-secondary'><?= $post['title'] ?></h2>
            </div>            
            <div class="mb-1 text-muted"><small><?= $post['date_creation_fr'] ?></small></div>
            <p class="card-text mb-auto"><?= substr($post['post'], 0, 400); ?>...</p>
            <hr class="my-3">
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