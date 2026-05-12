<?php 
namespace App\Controller;

use App\Entity\User;
use App\Services\DepartementService;
use App\Services\UserService;

class EmployeController{
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
        $employes=UserService::getAllEmployes();
        $this->render("employe/list",[
            "employes"=>$employes
        ]);
    }

    private function render(string $view,array $data=[]){
        extract($data);
        require_once dirname(__DIR__)."/Views/layout/header.partial.php"; 
        require_once dirname(__DIR__)."/Views/$view.php"; 
        require_once dirname(__DIR__)."/Views/layout/footer.partial.php"; 
    }

    
}