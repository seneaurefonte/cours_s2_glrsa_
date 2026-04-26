<?php 
require_once __DIR__."/services/AuthentificationService.php";
require_once __DIR__."/views/ClientView.php";
require_once __DIR__."/entity/Authentification.php";
class App{
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

   public static function main(){
        AuthentificationService::initialize();

        do {
            $auth=ClientView::saisieAuth();
            $auth=AuthentificationService::seConnecter($auth);
           if ($auth==null) {
              echo "Login ou Mot de passe incorrect\n";
           }
        } while ($auth==null);
          ClientView::menu($auth);
       
      
   }
}

App::main();