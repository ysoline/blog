<?php ob_start(); ?>


<div class="d-flex flex-column">
    <h4>Mes informations :</h4>
    <p>Pseudo : <?= strtoupper($getUser['pseudo']) ?></p>
    <p>Email : <?= $getUser['email'] ?></p>
</div>
<hr class="my-4">

<h4>Modifier mes informations :</h4>
<div class='d-flex justify-content-center'>
    <form action="index.php?action=editProfil" method='POST'>

        <div class=" d-flex justify-content-end mb-2  align-items-center">
            <label>Nouveau Pseudo :</label>
            <input class="ml-1" type="text" id="pseudo" name="pseudo" value="<?= strtoupper($getUser['pseudo']) ?>">
        </div>
        <div class=" d-flex justify-content-end mb-2 align-items-center">
            <label>Nouveau email :</label>
            <input class="ml-1" type="email" id="email" name="email" value="<?= $getUser['email'] ?>">
        </div>

        <div class="d-flex justify-content-center mt-2">
            <input type="submit" class='btn btn-primary' value="Modifier">
        </div>
</div>
</form>

<hr class="my-4">
<h4>Modifier mon mot de passe :</h4>
<form action="index.php?action=editPass" method='POST'>
    <div class="d-flex flex-column col-sm-4 mb-2">
        <label>Nouveau mot de passe :</label>
        <input class="mt-2" type="password" id="pass" name="pass" required>

        <label>Confirmation mot de passe :</label>
        <input class="mt-2" type="password" id="pass2" name="pass2" required>

        <div class="d-flex justify-content-center mt-2">
            <input type="submit" class='btn btn-primary' value="Modifier">
        </div>
    </div>
</form>
<hr class="my-4">
<h4>Supprimer mon compte :</h4>
<form action="index.php?action=deleteUser" method='POST'>
    <div class="d-flex flex-column col-sm-4 mb-2">
        <label>Attention, cette action est irréverssible</label><br />
        <div class="d-flex justify-content-center mt-2">
            <input type="submit" class='btn btn-primary' value="Supprimer">
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>