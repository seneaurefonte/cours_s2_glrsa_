<?php 
namespace App\Controller;

use App\Config\AbstractController;
use App\Entity\Taches;
use App\Services\TacheService;
use App\Services\UserService;
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
             switch ($_POST['btnSubmitCreateTache']) {
                case 'addTache':
                    # code...
                        //Recuperation
                                $dateDebut=$_POST['dateDebut'];
                                $dateFin=$_POST['dateFin'];
                                $nom=$_POST['nom'];
                        //Validation
                        //Ajouter la tache dans le Tableau de taches se trouvant dans la Session
                                $tache=new Taches();
                                $tache->setCode(TacheService::generateCode());
                                $tache->setDateDebut($dateDebut);
                                $tache->setDateFin($dateFin);
                                $tache->setNom($nom);
                                $_SESSION['taches'][]=$tache;
                                $empId=$_SESSION['empId']??0;
                           header("location:/tache/form?id=".$empId);
                    break;

                   case 'saveTache':
                      //Enregistre les taches en BD

                      //Detruite les donnees de l'employe + ses Taches
                       $empId=$_SESSION['empId'];
                        unset($_SESSION['empId']);
                        unset($_SESSION['taches']);
                        header("location:/tache/list?id=".$empId);

                    break;
                
                default:
                    # code...
                    break;
             }

        }

       public function  form():void{ 
           $idUser=(int)$_GET['id']??0;
           $employe= UserService::getUserById($idUser);
            if ($employe==null) {
                header("location:/employe/list");
            }
            $_SESSION['empId']=$idUser;
            $_SESSION['taches']=  $_SESSION['taches']??[];
           $this->render("taches/form",[
            "employe"=>$employe
           ]);
       }

        public function list():void{
               $idUser=$_GET['id']??$_SESSION['user']->getId();
               $taches=TacheService::getAllTachesByUser($idUser);
               $this->render("taches/list",[
               "taches"=>$taches
              ]);
    }   
}