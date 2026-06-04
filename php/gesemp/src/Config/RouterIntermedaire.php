<?php
namespace App\Config;
use App\Controller\DepartementController;
use App\Controller\EmployeController;
use App\Controller\SecurityController;
use App\Controller\TacheController;



final class RouterIntermedaire{
   /*
       Regle 1: 
       -Le nom de l'uri action doit  correspondre a une action d'un controller
         uri action =login  => SecurityController::login()
         uri action =list  => DepartementController::list() 

         Appel dynamique de la methode d'une classe
          class A{
            public function m1(){
                echo "methode m1 de la classe A";
            }
          }
          $a=new A();
          //Appel statique de la methode m1 de la classe A
            $a->m1(); 
          //Appel dynamique de la methode m1 de la classe
            $methodName="m1";
             $a->$methodName(); 

        //Verifie si une methode existe dans une classe
        if(method_exists($a,$methodName)){
            $a->$methodName();
        }else{
            echo "La methode $methodName n'existe pas dans la classe A";
        }
   */
    private function __construct()
    {
    }
    public static function route(string $uri):void
    {
        $uriParts=explode('/', $uri);
        $controllerName=$uriParts[1]??"departement";
        $uriPart2=$uriParts[2]??"list";
        $actonName=explode('?', $uriPart2)[0];
        switch ($controllerName) {
           case 'security':
             $secController=new SecurityController();
             if (method_exists($secController,$actonName)) {
                  $secController->$actonName();
             }else{
                http_response_code(404);
                echo "Page Not Found";
             }

            
             break;

             case 'tache':
             $secController=new TacheController();
             if (method_exists($secController,$actonName)) {
                  $secController->$actonName();
             }else{
                http_response_code(404);
                echo "Page Not Found";
             }

            
             break;
            case 'departement':
              $deptController = new DepartementController();
              if (method_exists($deptController,$actonName)) {
                $deptController->$actonName();
             }else{
                http_response_code(404);
                echo "Page Not Found";
             }
         
                break;
            case 'employe':
              $empController = new EmployeController();
              if (method_exists($empController,$actonName)) {
                $empController->$actonName();
             }else{   
                http_response_code(404);
                echo "Page Not Found";
                }
              
                break;
            default:
                $securityCtl=new SecurityController();
                $securityCtl->login();
                break;
               
        }
    }
}