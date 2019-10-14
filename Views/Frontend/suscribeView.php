<?php ob_start(); ?>
<h2 class='text-center my-3'>Inscription</h2>

<div class='container-fluid'>
    <form class="form-signin" action='inscrit' method="post">

        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class=" col-lg-2 mb-2 ">
                <label for="pseudo" class="sr-only">Pseudo : </label>
                <input type="text" id="pseudo" class="form-control" name="pseudo" placeholder="Pseudo" required
                    autofocus>
            </div>

            <div class=" col-lg-2 mb-2 ">
                <label for="password" class="sr-only">Mot de passe : </label>
                <input type="password" id="pass" class="form-control" name="pass" placeholder="Mot de passe" required>
            </div>
            <div class=" col-lg-2 mb-2 ">
                <label for="password" class="sr-only">Confirmation mot de passe : </label>
                <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirmer mot de passe"
                    required>
            </div>

            <div class=" col-lg-2 mb-2 ">
                <label for="email" class="sr-only">Mail : </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <div class=" col-lg-2 mb-2 ">
                <label for="email" class="sr-only">Confirmation mail : </label>
                <input type="email" class="form-control" id="email2" name="email2" placeholder="Confirmer email"
                    required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="alert alert-dismissible alert-secondary mt-2 col-lg-6 text-center">
                Vous affirmé avoir connaissance de notre <a href="policonf">politique de confidentialité</a>.
                Vous
                pouvez vous
                désinscrire à tout moment à l'aide du formulaire sur la page profil de votre compte ou en nous
                contactant à l'adresse email suivante : julie.pilarski@yahoo.fr
            </div>
        </div>

        <div class="d-flex justify-content-center mt-2">
            <input type="submit" value="S'incrire" class='btn btn-primary btn'>
        </div>


    </form>


</div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>