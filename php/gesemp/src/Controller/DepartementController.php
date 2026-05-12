<?php 
namespace App\Controller;

use App\Config\AbstractController;
use App\Entity\Departement;
use App\Services\DepartementService;
use Override;

/*
 DepartementController est un Controller 
  Controller est classe Mere de DepartementController
*/
class DepartementController extends AbstractController{

        #[Override]
        public  function __construct()
        {
            return parent::__construct();
        }
    public function  create():void{
        if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Request ==>saisieDepartement()
            $code=trim($_POST['code']);
            $nom=trim($_POST['nom']);
            $errors=[];
            //Regles de validation
               //Cas Invalides
                if (empty($code)) {
                    $errors['code']="Le code du departement est obligatoire";
                 }elseif(strlen($code)<4){
                  $errors['code']="Le code doit avoir au moins 4 caracteres";
                 }

                 if (empty($nom)) {
                    $errors['nom']="Le nom du departement est obligatoire";
                  }elseif(strlen($nom)<6){
                     $errors['nom']="Le nom doit avoir au moins 6 caracteres";
                 }
                 if(count($errors)!=0){
                   
                       $this->render("departement/form", [
                         "errors"=>$errors,
                         'old' =>["nom"=>$nom,"code"=>$code
                         ]
                    ]);
                     exit;
                   
                 }


          //extract($_POST);
           //Validation des Donnees


           $departement=new Departement();
           $departement->setCode($code);
           $departement->setNom($nom);
           DepartementService::addDepartement($departement);
           //Redirection
           header("location:/departement/list");
           exit;
        }else{
           header("location:/departement/list");
           exit;
        }

         


    }

     public function  form():void{ 
           $this->render("departement/form");
    }

     public function  list():void{
           $departements=DepartementService::getAllDepartements();
           $this->render("departement/list", [
              "departements"=>$departements,

           ]);
    }

   


    
}