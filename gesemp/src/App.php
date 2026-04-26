<?php 
namespace App;

use App\Entity\Departement;
use App\Services\DepartementService;
use App\Views\AdminView;

class App{
  private function __construct()
  {
         
  }

  public static function menu():void
  {
  
    do {
           echo "1-Ajouter Departement\n";
           echo "2-Lister les Departements\n";
           echo "3-Quitter\n";
          $choix=readline("Faites votre choix");
          switch ($choix) {
            case '1':
             $departement= AdminView::saisieDepartement();
             DepartementService::addDepartement($departement);
              # code...
              break;

              case '2':
             
             $departements=DepartementService::getAllDepartements();
             AdminView::afiicheDepartement($departements);

              # code...
              break;
            
            default:
              # code...
              break;
          }
     } while ($choix!=3);
       

  }
    

}

