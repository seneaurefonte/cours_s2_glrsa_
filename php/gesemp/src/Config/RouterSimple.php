<?php 
namespace App\Config;

use App\Controller\DepartementController;
use App\Controller\EmployeController;
use App\Controller\SecurityController;

final class RouterSimple{
    private function __construct()
    {
    }
    public static function route(string $uri):void
    {
        $uriParts=explode('/', $uri);
        $controllerName=$uriParts[1]??"departement";
        $actonName=$uriParts[2]??"list";
        switch ($controllerName) {
                case 'security':
                      $secController=new SecurityController();
                      switch ($actonName) {
                        case 'login':
                            $secController->login();
                            break;
                        case 'logout':
                            $secController->logout();
                            break;
                        default:
                            http_response_code(404);
                            echo "Page Not Found";
                            break;
                      }
                    break;

                case 'departement':
                      $deptController=new DepartementController();
                      switch ($actonName) {
                        case 'create':
                            $deptController->create();
                            break;
                        case 'form':
                            $deptController->form();
                            break;
                        case 'list':
                            $deptController->list();
                            break;
                        default:
                            http_response_code(404);
                            echo "Page Not Found";
                            break;
                      }
                    break;
                case 'employe':
                      $empController=new EmployeController();
                      switch ($actonName) {
                        case 'create':
                            $empController->create();
                            break;
                        case 'form':
                            $empController->form();
                            break;
                        case 'list':
                            $empController->list();
                            break;
                        default:
                            http_response_code(404);
                            echo "Page Not Found";
                            break;
                      }
                    break;
          default:
            http_response_code(404);
            echo "Page Not Found";
            break;
        }
    }
}