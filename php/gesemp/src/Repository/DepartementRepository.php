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
       parent::__construct();
       $this->tableName="departements";
       $this->className="App\\Entity\\Departement";
       //Departement::class. ==>"App\\Entity\\Departement"
   }

   public  function insert(Departement $departement):int
    {
        try {
                     $pdo= parent::getConnection();
                     $cursor=$pdo->prepare("insert INTO {$this->tableName}  (code,nom) values (:code,:nom);" );
                     $cursor->execute([
                        ":code"=>$departement->getCode(),
                        ":nom"=>$departement->getNom()
                      ]);
                    parent::closeConnection();
                     return $cursor->rowCount();
        } catch (\Throwable $th) {
              return 0;
        }
                  
    }

    

    public  function selectById(int $id):?Departement
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("select * from {$this->tableName}  where id=:id");
        $cursor->execute([':id' => $id]);
        $departement=$cursor->fetchObject($this->className);
        ///4-Fermer la connexion
         parent::closeConnection();
         return  $departement;
    }

    public function selectByCode(string $code):Departement|null
    {
          $pdo = parent::getConnection();
          $cursor = $pdo->prepare("select * from {$this->tableName}  where code=:code");
          $cursor->execute([':code' => $code]);
          $departement=$cursor->fetchObject($this->className);
         ///4-Fermer la connexion
           parent::closeConnection();
          return  $departement==false?null:$departement;
    }
   

}