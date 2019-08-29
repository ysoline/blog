<?php ob_start(); ?>
<h2>Connexion </h2>


<div class='d-flex justify-content-center'>
    <form class="form-signin" action='index.php?action=connect' method="post">

        <div class="flex-nowrap justify-content-center">
            <div class=" d-flex justify-content-end mb-2">
                <label for="pseudo" class="sr-only">Pseudo : </label>
                <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required autofocus>
            </div>

            <div class="d-flex justify-content-end">
                <label for="password" class="sr-only">Mot de passe : </label>
                <input class="form-control" type="password" id="pass" name="pass" placeholder="Mot de passe" required>
            </div>

            <div class="d-flex justify-content-center mt-2">
                <input type="submit" value="Connexion" class='btn btn-primary btn'>
            </div>

            <div class='d-flex flex-column align-items-center'>
                <a href='index.php?action=suscribePage' class="text-success">Pas encore inscrit ?</a>
            </div>
        </div>
    </form>

</div>
</div>

<?php $content = ob_get_clean(); ?> <?php require('template.php'); ?>