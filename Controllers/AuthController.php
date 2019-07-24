<?php 
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié)

class AuthController{

    public function log(){
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    public function newUser()//Inscription
    {
        if($_POST['pass'] == $_POST['pass2']){
            if($_POST['email'] == $_POST['email2'])
                {
                    $userManager = new AuthManager;
                    $_POST['pass']= password_hash($_POST['pass'], PASSWORD_DEFAULT);           
                    $newUser = $userManager -> addUser($_POST['pseudo'],$_POST['pass'],$_POST['email']);
                    header('Location: index.php?action=listPosts');
                }
                else{
                    throw new Exception('Les adresses emails ne sont pas identiques');
                }
        }
        else{
            throw new Exception('Les mots de passes ne sont pas identiques');
        }
         
    }

    public function login($pseudo, $pass)//Vérification pseudo et mot de passe si existant dans la bdd
    {
        $userManager= new AuthManager;
        $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $verifyPass = $userManager->connect($_POST['pseudo'], $pass_hash);
      
        $passOk = password_verify($_POST['pass'], $verifyPass['pass']);

        if($passOk){
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['pass'] = $_POST['pass'];

            header('Location: index.php?action=profil');
        }
        else{
            throw new Exception('Mauvais identifiant ou mot de passe');
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

    public function disconnect()
    {
        session_start();
        session_unset ();
        session_destroy();
        header ('Location: index.php?action=listPosts');
    }
}