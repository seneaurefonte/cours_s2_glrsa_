<?php 
namespace App\Controller;

use App\Config\AbstractController;


use App\Services\TacheService;

use Override;

/*
 EmployeController est un Controller 
 Controller est classe Mere de EmployeController
*/
class TacheController extends AbstractController{

        #[Override]
        public function __construct()
        {
            return parent::__construct();
      }
       public function  create():void{
       

        }

       public function  form():void{
        
      }

        public function list():void{
               $idUser=$_GET['id']??$_SESSION['user']->getId();
               $taches=TacheService::getAllTachesByUser($idUser);
               $this->render("taches/list",[
               "taches"=>$taches
              ]);
    }   
}