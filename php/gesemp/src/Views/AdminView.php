<?php 
namespace App\Views;

use App\Entity\Departement;
use App\Entity\User;

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


     public static function saisieUser(array $departements):User{

      $nom=self::saisieChaine("Entrer le nom");
      $prenom=self::saisieChaine("Entrer le prenom");
      $telephone=self::saisieChaine("Entrer le telephone");
      $email=self::saisieChaine("Entrer l'email");

      foreach ($departements as $key => $departement) {
          echo "$key - ". $departement->getNom()."\n";
      }
      $index=(int)readline("Veullez selectionner un departement");
      $departement=$departements[$index];

      $user=new User();
      $user->setNom( $nom);
      $user->setPrenom( $prenom);
      $user->setTelephone( $telephone);
      $user->setEmail( $email);
      $user->setDepartement($departement);
    return $user;
  }

   public static function afficheUsers(array $users):void{
        foreach ($users as  $value) {
             echo $value;
        }
    }


  private static function saisieChaine(string $sms):string{
     do{
    $value=readline($sms);
    }while (empty($value));
    return $value;
  }

}