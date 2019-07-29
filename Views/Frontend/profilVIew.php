<?php ob_start(); ?>


Pseudo : <?= $_SESSION['pseudo'] ?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePseudo">
    Changer de pseudo
</button> <br />
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePass">Modifier le mot de
    passe</button>
<br />

email : <?= $_SESSION['email'] ?><br />


<div class="modal fade" id="changePseudo" tabindex="-1" role="dialog" aria-labelledby="modalChangePseudo"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangePseudo">Changement de pseudo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=editPseudo" method='POST'>
                    <label>Nouveau Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="<?= $_SESSION['pseudo'] ?>" required>
                    <input type="submit" class='btn' value="Confirmer">
                    <input type="button" class='btn' value="Annuler" data-dismiss="modal">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="modalChangePseudo"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangePseudo">Changement de mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=editPass" method='POST'>
                    <label>Nouveau mot de passe :</label>
                    <input type="text">
                    <input type="submit" class="btn" value="Confirmer">
                    <input type="button" class='btn' value="Annuler" data-dismiss="modal">
                </form>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>