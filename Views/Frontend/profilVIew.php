<?php ob_start(); ?>

<form action='index.php?action' method='POST'>
    Pseudo : <?= $_SESSION['pseudo'] ?><br />
    id : <?= $_SESSION['id'] ?><br />
    pass : <?= $_SESSION['pass'] ?><br />
    email : <?= $_SESSION['email'] ?><br />
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>