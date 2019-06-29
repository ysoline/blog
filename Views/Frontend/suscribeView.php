<?php ob_start(); ?>
    <h2>Inscription</h2>
    
    <div class='d-flex justify-content-center'>
        <form action='../../index.php?action=suscribe' method="post">
        

        <div class="d-flex justify-content-center">
            <label for ="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo"/>
        </div>

        <div class="d-flex justify-content-center">
            <label for ="password">Mot de passe : </label>
            <input type="text" id="pass1" name="pass1"/>
        </div>
        <div class="d-flex justify-content-center">
            <label for ="password">Confirmation mot de passe : </label>
            <input type="text" id="pass2" name="pass2"/>
        </div>

        <div class="d-flex justify-content-center">
            <label for ="email">Mail : </label>
            <input type="text" id="email" name="email"/>
        </div>  
        
        <div class="d-flex justify-content-center">
            <label for ="email">Confirmation mail : </label>
            <input type="text" id="email2" name="email2"/>
        </div>

        <div>
            <input type="submit" value="S'incrire"/>
        </div>

        <button type="button"><a href="../../index.php">Retour</a></button>
        </form>
    </div>


    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>