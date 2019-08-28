<?php ob_start(); ?>
<h2>Connexion </h2>

<div class='d-flex justify-content-center'>
    <form action='index.php?action=connect' method="post">

        <div class="flex-nowrap justify-content-center">
            <div class=" d-flex justify-content-end mb-2">
                <label for="pseudo">Pseudo : </label>
                <input class="ml-1" type="text" id="pseudo" name="pseudo" required>
            </div>

            <div class="d-flex justify-content-end">
                <label for="password">Mot de passe : </label>
                <input class="ml-1" type="password" id="pass" name="pass" required>
            </div>

            <div class="d-flex justify-content-center mt-2">
                <input type="submit" value="Connexion" class='btn btn-primary btn'>
            </div>

            <div class='d-flex flex-column align-items-center'>
                <a href='index.php?action=suscribePage' class="text-success">Pas encore inscrit ?</a>
            </div>
        </div>
    </form>


    <?php $content = ob_get_clean(); ?> <?php require('template.php'); ?>