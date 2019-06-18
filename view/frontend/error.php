<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<span>ERREUR !</span>
<p>Une erreur a été detecté</p>

<?php $errorMessage='Il s\'est produit une erreur'?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>