 <?php

use App\App;

use App\Controller\DepartementController;
use App\Controller\EmployeController;

 require_once __DIR__."/vendor/autoload.php";
$deptController=new DepartementController();
$empController=new EmployeController();
$uri=($_SERVER['REQUEST_URI']);
switch ($uri) {
         case "/": 
         case '/departement/list':
          $deptController->list(); 
            break;
         case '/departement/form':
        $deptController->form();
        break;
        case '/departement/create':
          $deptController->create();
       break;

       case '/employe/form':
          $empController->form();
         break;
      case '/employe/create':
          $empController->create();
         break;
       case '/employe/list':
          $empController->list();
         break;
   
    
      default:
        # code...
        break;
}



//uri /admin/store $controller->store();