<?php ob_start(); ?>


<div class="d-flex flex-column text-center">
    <h4>Mes informations :</h4>
    <p>Pseudo : <?= strtoupper($getUser['pseudo']) ?></p>
    <p>Email : <?= $getUser['email'] ?></p>
</div>
<hr class="my-4">

<h4 class="text-center">Modifier mes informations :</h4>
<div class='d-flex justify-content-center'>
    
    <form class="form-signin" action="index.php?action=editProfil" method='POST'>

        <div class="flex-nowrap justify-content-center">

            <div class="d-inline-flex justify-content-end mb-2 align-items-center">
                <label>Nouveau Pseudo :</label>
                <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= strtoupper($getUser['pseudo']) ?>">
            </div>

            <div class=" d-flex justify-content-end mb-2 align-items-center">
                <label>Nouvel email :</label>
                <input class="form-control" type="email" id="email" name="email" value="<?= $getUser['email'] ?>">
            </div>

            <div class="d-flex justify-content-center mt-2">
                <input type="submit" class='btn btn-primary' value="Modifier">
            </div>
        </div>
    </form>
</div>
    <hr class="my-4">
    <h4 class="text-center">Modifier mon mot de passe :</h4>
    <div class='d-flex justify-content-center'>

    <form class="form-signin" action="index.php?action=editPass" method='POST'>

        <div class="flex-nowrap justify-content-center">

            <div class=" d-flex justify-content-end mb-2">
                <label class="sr-only">Nouveau mot de passe :</label>
                <input class="mt-2 form-control" type="password" id="pass" name="pass" placeholder="Mot de passe" required>
            </div>

            <div class=" d-flex justify-content-end mb-2">
                <label class="sr-only">Confirmation mot de passe :</label>
                <input class="mt-2 form-control" type="password" id="pass2" name="pass2" placeholder="Confirmer mot de passe" required>
            </div>

            <div class="d-flex justify-content-center mt-2">
                <input type="submit" class='btn btn-primary' value="Modifier">
            </div>

        </div>
    </form>
</div>
    <hr class="my-4">
    <h4 class="text-center">Supprimer mon compte :</h4>

    
    <form class="form-signin" action="index.php?action=deleteUser" method='POST'>
    <div class="d-flex align-items-center flex-column">
        
            <label>Attention, cette action est irréverssible</label>

        <div class="d-flex justify-content-center">
                <input type="submit" class='btn btn-primary' value="Supprimer">
            </div>
        </div>
    </form>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>