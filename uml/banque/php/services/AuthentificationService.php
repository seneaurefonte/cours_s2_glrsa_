<?php 
require_once dirname(__DIR__)."/entity/Authentification.php";
require_once dirname(__DIR__)."/entity/Compte.php";
class AuthentificationService{
    private static array $authentications=[];
       private static  int $nbreAuth=0;

    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

    public static function initialize():void{
       for ($i=1; $i <=5 ; $i++) { 
           self::$nbreAuth++;
           self::$authentications[$i]= new  Authentification("user".$i,"user".$i,new Compte("CPT0001".$i,"Baila Wane",1000000*$i));
       }
    }
    public static function seConnecter(Authentification $auth):?Authentification
    {
          for ($i=1; $i <self::$nbreAuth ; $i++) { 
                if(self::$authentications[$i]->getLogin()==$auth->getLogin() &&  self::$authentications[$i]->getPassword()==$auth->getPassword()){
                     return self::$authentications[$i];
                }
          }

       return null;

    }
}