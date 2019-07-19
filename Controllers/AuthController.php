<?php 
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié)

class AuthController{

    public function startSession(){
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    public function newUser($pseudo, $pass,$pass2, $email)//Inscription
    {
        if(isset($_POST['pass']) == $_POST['pass2']){
            if(isset($_POST['email']) == $_POST['email2'])
                {
                    $userManager = new AuthManager;           
                    $newUser = $userManager -> addUser($pseudo, $pass, $email);
                }
                else{
                    throw new Exception('Les adresses emails ne sont pas identiques');
                }
        }
        else{
            throw new Exception('Les mots de passes ne sont pas identiques');
        }
         
    }

    public function login($pseudo, $pass)//Vérification du mot de passe lors de la connexion
    {
       $verifyUser = new AuthManager;
       $verifyUser -> checkUser($pseudo);

       if($verifyUser == false){
           throw new Exception("Mauvais identifiant ou mot de passe!");
       }
       else {
           $verifyPass = new AuthManager;
           $verifyPass = password_verify($pass, $verifyUser->checkPass($pass));
           
           if($verifyPass == true){
               startSession();            
               header('Location: index.php?action=listPosts');
           }
           else {
               throw new Exception("Mauvais identifiant ou mot de passe!", 1);
               
           }
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