<?php $title ?>

<?php ob_start(); ?>
    
    <!-- <?= $content ?> -->


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>