<?php $title ?>

<?php ob_start(); ?>
    
    <div class='d-flex justify-content-center'>
        <form action='index.php?action=newUser' method="post">

        <div class="d-flex justify-content-center">
            <label for ="pseudo">Pseudo : </label>
            <input type="text" id="pseudo" name="pseudo"/>
        </div>

        <div class="d-flex justify-content-center">
            <label for ="password">Mot de passe : </label>
            <input type="text" id="password" name="password"/>
        </div>
        <div class="d-flex justify-content-center">
            <label for ="password">Confirmation mot de passe : </label>
            <input type="text" id="password2" name="password2"/>
        </div>

        <div class="d-flex justify-content-center">
            <label for ="mail">Mail : </label>
            <input type="text" id="mail" name="mail"/>
        </div>  
        
        <div class="d-flex justify-content-center">
            <label for ="mail">Confirmation mail : </label>
            <input type="text" id="mail2" name="mail2"/>
        </div>

        <div class="d-flex justify-content-center pt-2">
            <input type="submit" value="S'incrire"/>
        </div>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>