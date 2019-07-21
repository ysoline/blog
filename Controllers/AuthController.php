<?php 
//Regrouppe toutes les fonctionnalités liès à l'authentification: connexion, inscription, mot de passe oublié)

class AuthController{

    public function startSession(){
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
       $verifyUser -> checkUser($_POST['pseudo']);

       if($verifyUser == false){
           throw new Exception("Mauvais identifiant ou mot de passe!");
       }
       else {

            $pass_hash= password_hash($_POST['pass'], PASSWORD_DEFAULT);              
            $verifyPass = new AuthManager;
            $verifyPass ->checkPass($pass);
           
           if(password_verify($pass, $pass_hash)){
                        echo 'connecté !';  
            //    header('Location: index.php?action=listPosts');
           }
           else {
               throw new Exception("Mauvais identifiant ou mot de passe!");
               
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