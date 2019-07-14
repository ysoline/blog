<?php 
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié)

class AuthController{
    public function newUser($pseudo, $pass, $email)//Inscription
    {
        $userManager = new AuthManager;
        $newUser = $userManager -> addUser($pseudo, $pass, $email);

        header('Location: index.php?action=listPosts');
    }

    public function loginVerify($pass)//Vérification du mot de passe lors de la connexion
    {
        $checkPass = new AuthManager;
        
        $checkPass -> getPass($pass);

        if($checkPass == password_verify($_POST['pass'], $pass))
        {
            $coUser = new AuthManager;
            $coUser -> getUser($_POST['pseudo'], $_POST['pass']);
        }
        else{
            throw new Exception("Mauvais identifiants et/ou mot de passe");
            
        }
    }

    public function connectPage()//Redirection page connexion
    {
        require('Views/Frontend/authView.php');
    }
    public function suscribePage()//Redirection page inscription
    {
        require('Views/Frontend/suscribeView.php');
    }

}