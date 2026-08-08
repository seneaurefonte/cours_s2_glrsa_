<?php 
namespace App\Repository;

use App\Config\AbstractRepository;
use App\Entity\Taches;

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

    /*
        INSERT INTO taches(nom,dateDebut,dateFin,code,user_id)
        values
         ("Faire le Diagramme de Use case Conception ","2026-06-02-00-00-00","2026-06-04","T0002",2);
    
    */
          /*
                Lorsqu'on fait plusieurs operations de MAJ(insert,update,delete) dans une table ou dans plusieurs tables
                on dit qu'on fait une transaction
                 - Une transaction soit elle est aboutie ou elle est Rejetee
                 Exemple :
                   -Inserer dans la table  taches 10 taches ==> Transaction BD
                     -- 10 taches inserees avec succees
                     -- Aucune tache inseree
                  Scenario
                    BD :  10 taches
                        t1 inseree
                        t2 inseree
                        t3 inseree
                        t4 erreur insertion. ==> Rollback 
                        delete  t1
                        delete  t2
                        delete  t3
                        delete  t4  
                        
                 Exemple1  :  Use case Incrire Etudiant
                                     -inserer dans la table etudiant
                                     -inserer dans la table inscription
                                     -inserer dans la table payement
                
          */

public  function insertAll(array $taches,int $empId):int
    {
        $pdo= parent::getConnection();
        try {
                     
                      $pdo->beginTransaction();
                        $cursor=$pdo->prepare("insert INTO {$this->tableName}  (nom,dateDebut,dateFin,code,user_id) values (:nom,:dateDebut,:dateFin,:code,:userId)");
                        $rowCount=0;
                        foreach ($taches as $tache) {
                            $cursor->execute([
                            ":code"=>$tache->getCode(),
                            ":nom"=>$tache->getNom(),
                            ":dateDebut"=>$tache->getDateDebut(),
                            ":dateFin"=>$tache->getDateFin(),
                            ":userId"=>$empId,
                            ]);
                            $rowCount= $rowCount+$cursor->rowCount();
                        }
                       $pdo->commit();
                       parent::closeConnection();
                     return $cursor->rowCount();
        } catch (\Throwable $th) {
                 $pdo->rollBack();
                parent::closeConnection();
               return 0;
        }
                  
    }


    public  function selectByLastCode():?Taches
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("select * from {$this->tableName}   ORDER BY code DESC LIMIT 0,1");
        $cursor->execute();
        $tache=$cursor->fetchObject($this->className);
        ///4-Fermer la connexion
         parent::closeConnection();
         return  $tache==false?null: $tache;
 }

 }
