<?php ob_start(); ?>

<form action='index.php?action' method='POST'>
    Pseudo : <?= $_SESSION['pseudo'] ?>

<br/>
<a href="index.php?action=disconnect" class='btn btn-primary btn'>Se déconnecter</a>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>