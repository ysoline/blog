<?php ob_start(); ?>

<form action="index.php?action=editPost&amp;id=<?= $post['id']; ?>" method="POST">
    <legend>Edition de billet :</legend>
    <input type="text" id="title" name="title" required value="<?= $post['title'] ?>">
    <br />
    <br />
    <textarea id="post" name="post" value=""></textarea>
    <br />
    <input type="submit" class="btn btn-primary" value="Publier">
</form>

<div class="card border-danger m-3" style="max-width: 20rem;">
    <div class="card-header">Suppression du post</div>
    <div class="card-body">
        <form action="index.php?action=deletePost&amp;id=<?= $post['id']; ?>" method="post">
            <label>Veuillez confirmer la suppression en écrivant "SUPPRIMER"</label>
            <input id="deletePost" name="deletePost" required><br />
            <small class='text-danger'>Attention, cette action est irréverssible </small><br />
            <input class='btn btn-outline-danger' type="submit" value="Supprimer">
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('Views/Frontend/template.php'); ?>