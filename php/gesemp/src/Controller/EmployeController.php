<?php 
namespace App\Controller;

use App\Config\AbstractController;
use App\Entity\User;
use App\Services\DepartementService;
use App\Services\UserService;
use Override;

/*
 EmployeController est un Controller 
 Controller est classe Mere de EmployeController
*/
class EmployeController extends AbstractController{

        #[Override]
        public function __construct()
        {
            return parent::__construct();
      }
    public function  create():void{
        //Recuparer les donnees du formulaire
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $nom=trim($_POST['nom']);
            $prenom=trim($_POST['prenom']); 
            $email=trim($_POST['email']);
            $telephone=trim($_POST['telephone']);
            $departementId=trim($_POST['departement_id']);

            $user=new User();
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setTelephone($telephone);
            $user->setDepartementId($departementId);
            UserService::addUser($user);
        }

    }

     public function  form():void{
        $departements=DepartementService::getAllDepartements();
         $this->render("employe/form",[
            "departements"=>$departements
         ]);
        //$
        $this->render("employe/form");
    }

    public function list():void{
         $idChef=0;
        if(isset($_SESSION['user'])  && $_SESSION['user']->getTypeUser()->value=="CHEF"){
           $idChef=$_SESSION['user']->getId();
        }
        $employes=UserService::getAllEmployesByTypeUser($idChef);
        $this->render("employe/list",[
            "employes"=>$employes
        ]);
    }


    
}