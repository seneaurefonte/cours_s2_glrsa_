<?php 
namespace App\Controller;

use App\Config\Validator;
use App\Services\UserService;

class SecurityController{
    //Classe Session static 
    //Ouvrir Session, Fermer la session
      //Verifier Role isAdmin() isChef() , isConnect()
    public function login():void{
        if ($_SERVER['REQUEST_METHOD']=="GET") {
            require_once dirname(__DIR__)."/Views/security/login.php"; 
        }else if($_SERVER['REQUEST_METHOD']=="POST"){
            $email=trim($_POST['email']);
            $password=trim($_POST['password']);
            //Validation des Donnees
            Validator::isEmpty($email,"email","L'email est obligatoire");
            Validator::isEmpty($password,"password","Le mot de passe est obligatoire");
            if(!Validator::validate()){
                 $errors=Validator::getErrors();
                 require_once dirname(__DIR__)."/Views/security/login.php";
                exit;
            }
             //Connexion=Authentification +Autorisation
             //Authentification : Rechercher l'existence du user en BD

               $user=UserService::getUserByEmail($email);
               $errors=[];
               if ($user==null || $user->getPassword()!=$password) {
                $errors['connexion']="Invalid username or password";
                require_once dirname(__DIR__)."/Views/security/login.php"; 
                exit;
               }
               //Redirection vers la page d'accueil
               //Autorisation: Verifier le role de l'utilisateur pour lui donner les droits d'acces a certaines pages
                 $_SESSION['user']=$user;
                 if(isset($_SESSION['user']) && $_SESSION['user']->getTypeUser()->value=="ADMIN"){
                      header("location:/departement/list");
                 }elseif(isset($_SESSION['user'])  && $_SESSION['user']->getTypeUser()->value=="CHEF"){
                       header("location:/employe/list");
                 }else{
                     $errors['connexion']="Vous n'avez pas les autoridations pour vous connecter dans ce systeme ";
                       require_once dirname(__DIR__)."/Views/security/login.php"; 
                 }
               
                exit;
            
        }
       
    }

     public function logout():void{
        unset($_SESSION['user']);
        session_destroy();
        header("location:/security/login");
        exit;
     }
    
    }
 