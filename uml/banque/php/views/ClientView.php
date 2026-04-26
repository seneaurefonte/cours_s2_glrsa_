<?php 
require_once dirname(__DIR__)."/entity/Authentification.php";
class ClientView{
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static function saisieAuth():Authentification
    {
        $login=readline("Entrer le Login: ");
        $password=readline("Entrer le Password: ");
        return new Authentification($login, $password);
    }

    public static function menu(Authentification $auth):void
    {
        do {
            echo "1-Lister ses Transactions\n";
            echo "2-Quitter\n";
             $choix=readline("Entrer Votre choix");
             $compte=$auth->getCompte();
              switch ($choix) {
                case '1':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        } while ($choix!=2);
    }


}