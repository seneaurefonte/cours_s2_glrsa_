<?php 
namespace App\Controller;

use App\Config\AbstractController;
use App\Config\Validator;
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
           
            //Regles de validation
              Validator::isEmpty($code,"code","Le code du departement est obligatoire");
              Validator::isEmpty($nom,"nom","Le nom du departement est obligatoire");
               //Cas Invalides
                 if(!Validator::validate()){
                    $errors=Validator::getErrors();
                    $this->render("departement/form", [
                         "errors"=>$errors,
                         'old' =>$_POST
                         ]);
                    exit;
                 }
                 //Erreurs metiers
                  $errors=[];
                  $departement=  DepartementService::getDepartementByCode($code);
                   if ($departement!=null) 
                   {
                      $errors['code']="Ce code existe deja";
                   }


            //extract($_POST);
            //Validation des Donnees
                $departement=new Departement();
                $departement->setCode($code);
                $departement->setNom($nom);
                $result= DepartementService::addDepartement($departement);
                if(!$result){ 
                        $errors['nom']="Ce nom existe deja";     
                }
                if(count($errors)>0){
                    $this->render("departement/form", [
                            "errors"=>$errors,
                            'old' =>$_POST
                            ]);
                        exit;
                }
                /*
                 $errors=  Validator::validate($_POST,[
                    "code"=>["required","unique:departements,code"],
                    "nom"=>["required","unique:departements,nom"]
                 ]); 
                    if(count($errors)>0){
                        $this->render("departement/form", [
                                "errors"=>$errors,
                                'old' =>$_POST
                                ]);
                            exit;
                    }
                
                */

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