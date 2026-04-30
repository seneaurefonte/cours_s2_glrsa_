<?php 
namespace App;

use App\Controller\AdminController;


class App{
  private function __construct()
  {
         
  }

  public static function menu():void
  {
     $controller=new AdminController();
    do {
           echo "1-Ajouter Departement\n";
           echo "2-Lister les Departements\n";
           echo "3-Ajouter Users\n";
           echo "4-Lister les Users\n";
           echo "5-Quitter\n";
          $choix=readline("Faites votre choix");
          switch ($choix) {
            case '1':
                $controller->createDepartement();
              # code...
              break;
              case '3':
                  $controller->createUser();
              # code...
              break;
              case '2':
                 $controller->listDepartements();
              # code...
               break;

               case '4':
                 $controller->listUsers();
            default:
              # code...
              break;
          }
     } while ($choix!=5);
       

  }
    

}

