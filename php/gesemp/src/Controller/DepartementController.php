<?php 
namespace App\Controller;

use App\Entity\Departement;
use App\Services\DepartementService;

class DepartementController{
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
                  }elseif(strlen($code)<6){
                     $errors['nom']="Le nom doit avoir au moins 6 caracteres";
                 }

                 //Erreurs
                 if(count($errors)!=0){
                    //Erreurs doivent etre stocker dans la session;
                       /*$this->render("/departement/form", [
                         "errors"=>$errors,
                         'old' =>["nom"=>$nom,"code"=>$code
                         ]
                    ]);*/
                     header("location:/departement/form");
                     exit;
                   
                 }


          //extract($_POST);
           //Validation des Donnees


           $departement=new Departement();
           $departement->setCode($code);
           $departement->setNom($nom);
           DepartementService::addDepartement($departement);
           //Redirection
           header("location:/departement/form");
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

    private function render(string $view,array $data=[]){
        extract($data);
        require_once dirname(__DIR__)."/Views/layout/header.partial.php"; 
        require_once dirname(__DIR__)."/Views/$view.php"; 
        require_once dirname(__DIR__)."/Views/layout/footer.partial.php"; 
    }


    
}