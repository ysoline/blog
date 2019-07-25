<?php ob_start(); ?>

<form action='index.php?action' method='POST'>
    Pseudo : <?= $_SESSION['pseudo'] ?>
    
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>