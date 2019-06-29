<?php ob_start() ?>

   <form action="index.php?action=connect" method="post">
        <input type="text" id="pseudo" name="pseudo" placeholder="pseudo">
        <input type="texe" id="password" name="password" placeholder="mot de passe">
        <input type="submit" value="Connexion">
    </form>

    <form action="Views/Frontend/suscribeViews.php" method="post">
        <input type="submit" value="Inscription">
    </form>

    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>