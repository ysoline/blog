<?php ob_start(); ?>
    <h2>Inscription</h2>
    
    <div class='d-flex justify-content-center'>
        <form action='index.php?action=suscribe' method="post">
        

        <div class="d-flex justify-content-center">
            <label for ="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo"/>
        </div>

        <div class="d-flex justify-content-center">
            <label for ="password">Mot de passe : </label>
            <input type="password" id="pass" name="pass"/>
        </div>
        <div class="d-flex justify-content-center">
            <label for ="password">Confirmation mot de passe : </label>
            <input type="password" id="pass2" name="pass2"/>
        </div>

        <div class="d-flex justify-content-center">
            <label for ="email">Mail : </label>
            <input type="email" id="email" name="email"/>
        </div>  
        
        <div class="d-flex justify-content-center">
            <label for ="email">Confirmation mail : </label>
            <input type="email" id="email2" name="email2"/>
        </div>

        <div>
            <input type="submit" value="S'incrire" class='btn btn-primary btn'>
        </div>
        <a href="index.php?action=listPosts" class='btn btn-primary btn'>Retour</a>

        </form>
    </div>


    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>