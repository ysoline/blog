<?php ob_start(); ?>

<form action="../../index.php?action=addPost" method="POST">
    <legend>Ajout de billet :</legend>
    <input type="text" id="title" name="title" placeholder="Titre de l'article" required> <br />
    <br />
    <textarea id="post" name="post"></textarea>
    <br />
    <input type="submit" class="btn btn-primary" value="Publier">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('../Frontend/template.php'); ?>