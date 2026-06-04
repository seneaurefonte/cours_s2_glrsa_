<?php 
namespace App\Repository;

use App\Config\AbstractRepository;


 class TacheRepository extends AbstractRepository{
   private static ?TacheRepository $instance=null;
  public static function getInstance():TacheRepository
  {
    if(self::$instance==null)
    {
        self::$instance=new TacheRepository();
    }
    return self::$instance;
  }
  private function __construct()
   {
       parent::__construct();
       $this->tableName="taches";
       $this->className="App\\Entity\\Taches";
       //Departement::class. ==>"App\\Entity\\Departement"
   }

    public  function selectAllByUser(int $idUser):array
    {
        $pdo = $this->getConnection();
           $cursor = $pdo->prepare("select * from {$this->tableName} where user_id=:idUser");
           $cursor->execute([':idUser' => $idUser]);
           $users=$cursor->fetchAll(\PDO::FETCH_CLASS,$this->className);
        ///4-Fermer la connexion
        $this->closeConnection();
         return  $users;
    }

 }
