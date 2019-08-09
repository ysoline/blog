<?php ob_start(); ?>
<h2>Connexion</h2>

<div class='d-flex justify-content-center'>
    <form action='index.php?action=connect' method="post">

        <div class="d-flex justify-content-center">
            <label for="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo" required>
        </div>

        <div class="d-flex justify-content-center">
            <label for="password">Mot de passe : </label>
            <input type="password" id="pass" name="pass" required>
        </div>

        <div>
            <input type="submit" value="Connexion" class='btn btn-primary btn'>
        </div>

        <div class='d-flex flex-column align-items-center'>
            <a href='index.php?action=suscribePage'>Pas encore inscrit ?</a>
            <a href="index.php?action=listPosts" class='btn btn-primary btn'>Retour</a>
        </div>
    </form>


    <?php $content = ob_get_clean(); ?> <?php require('template.php'); ?>