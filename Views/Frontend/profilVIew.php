<?php ob_start(); ?>


Pseudo : <?= $_SESSION['pseudo'] ?>


email : <?= $_SESSION['email'] ?><br />

<form action="index.php?action=editProfil" method='POST'>
    <label>Nouveau Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" value="<?= $_SESSION['pseudo'] ?>"><br />

    <label>Nouveau email :</label>
    <input type="email" id="email" name="email" value="<?= $_SESSION['email'] ?>"><br />

    <input type="submit" class='btn btn-primary' value="Modifier mon profil">

</form>

<form action="index.php?action=editPass" method='POST'>
    <label>Nouveau mot de passe :</label>
    <input type="password" id="pass" name="pass"><br />

    <label>Confirmation mot de passe :</label>
    <input type="password" id="pass2" name="pass2"><br />

    <input type="submit" class='btn btn-primary' value="Modifier mon mot de passe">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>