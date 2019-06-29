<?php $title ?>

<?php ob_start(); ?>
<span>ERREUR !</span>
<p>Une erreur a été detecté</p>

<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
<?php $errorMessage='Il s\'est produit une erreur'?>
<a href="index.php" class="btn btn-outline-secondary">Accueil</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>