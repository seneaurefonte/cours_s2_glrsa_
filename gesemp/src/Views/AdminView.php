<?php 
namespace App\Views;

use App\Entity\Departement;

class  AdminView{
  private function __construct()
  {
    throw new \Exception('Not implemented');
  }

  public static function saisieDepartement():Departement{
    do{
      $code=readline("Entrer le code");
    }while (empty($code));
    do{
    $nom=readline("Entrer le nom");
    }while (empty($nom));
    $departement=new Departement();
    $departement->setNom( $nom);
     $departement->setCode( $code);
    return $departement;
  }

    public static function afiicheDepartement(array $departements):void{
        foreach ($departements as  $value) {
             echo $value;
        }
    }
}