<?php 
namespace App\Repository;

use App\Config\Database;
use App\Entity\Departement;

 class DepartementRepository{
  private function __construct()
   {
    throw new \Exception('Not implemented');
   }

   public static function insert(Departement $departement):int
    {
  
                    $pdo= Database::getConnection();
                     $cursor=$pdo->prepare("insert INTO departements (code,nom) values (:code,:nom);" );
                     $cursor->execute([
                        ":code"=>$departement->getCode(),
                        ":nom"=>$departement->getNom()
                      ]);
                    Database::closeConnection();
                     return $cursor->rowCount();
    }

     public static function selectAll():array
     {
                    $pdo = Database::getConnection();
                    $cursor = $pdo->query("select * from departements");
                     $departements=$cursor->fetchAll(\PDO::FETCH_CLASS,Departement::class);
                   ///4-Fermer la connexion
                    Database::closeConnection();
                  return  $departements;
        
    }

    public static function selectById(int $id):?Departement
    {
        $pdo = Database::getConnection();
        $cursor = $pdo->prepare("select * from departements where id=:id");
        $cursor->execute([':id' => $id]);
        $departement=$cursor->fetchObject(Departement::class);
        ///4-Fermer la connexion
         Database::closeConnection();
         return  $departement;
    }


}