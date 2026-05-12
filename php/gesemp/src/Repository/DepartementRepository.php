<?php 
namespace App\Repository;

use App\Config\AbstractRepository;
use App\Entity\Departement;

 class DepartementRepository extends AbstractRepository{
  private static ?DepartementRepository $instance=null;
  public static function getInstance():DepartementRepository
  {
    if(self::$instance==null)
    {
        self::$instance=new DepartementRepository();
    }
    return self::$instance;
  }
  private function __construct()
   {
      return parent::__construct();
   }

   public  function insert(Departement $departement):int
    {
                    $pdo= parent::getConnection();
                     $cursor=$pdo->prepare("insert INTO departements (code,nom) values (:code,:nom);" );
                     $cursor->execute([
                        ":code"=>$departement->getCode(),
                        ":nom"=>$departement->getNom()
                      ]);
                    parent::closeConnection();
                     return $cursor->rowCount();
    }

     public  function selectAll():array
     {
                    $pdo = parent::getConnection();
                    $cursor = $pdo->query("select * from departements");
                     $departements=$cursor->fetchAll(\PDO::FETCH_CLASS,Departement::class);
                   ///4-Fermer la connexion
                    parent::closeConnection();
                  return  $departements;
        
    }

    public  function selectById(int $id):?Departement
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("select * from departements where id=:id");
        $cursor->execute([':id' => $id]);
        $departement=$cursor->fetchObject(Departement::class);
        ///4-Fermer la connexion
         parent::closeConnection();
         return  $departement;
    }


}