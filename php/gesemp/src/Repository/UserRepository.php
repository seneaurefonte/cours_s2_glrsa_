<?php 
namespace App\Repository;

use App\Config\AbstractRepository;
use App\Entity\User;

class UserRepository extends AbstractRepository{
    private static ?UserRepository $instance=null;

   public static function getInstance():UserRepository
   {
    if(self::$instance==null){
        self::$instance=new UserRepository();
    }
    return self::$instance;
   }

    private function __construct()
    {
        parent::__construct();
        $this->tableName="users";
         $this->className="App\\Entity\\User";
    }
    public  function insert(User $user):int
    {
      $pdo= parent::getConnection();
        $cursor=$pdo->prepare("insert INTO {$this->tableName} (nom,prenom,email,telephone,departement_id) values (:nom,:prenom,:email,:telephone,:departementId)" );
        $cursor->execute([
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':telephone' => $user->getTelephone(),
            ':departementId' => $user->getDepartement()->getId(),
        ]);
         //5-Renvoyer l'id de l'user inséré
        $lastInsertId = $pdo->lastInsertId();
        //4-Fermer la connexion
         parent::closeConnection();
         return $lastInsertId;
    }
   

    public   function selectById(int $id):?User
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("select * from {$this->tableName} where id=:id");
        $cursor->execute([':id' => $id]);
        $user=$cursor->fetchObject($this->className);
        ///4-Fermer la connexion
         parent::closeConnection();
         return  $user;
    }

    public  function update(User $user):bool
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("update {$this->tableName} set nom=:nom, prenom=:prenom, email=:email, telephone=:telephone where id=:id");
        $result = $cursor->execute([
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':telephone' => $user->getTelephone(),
            ':id' => $user->getId()
        ]);
         //4-Fermer la connexion
         parent::closeConnection();
         return $result;
    }

        public function selectByEmail(string $email):?User
        {
            $pdo = parent::getConnection();
            $cursor = $pdo->prepare("select * from {$this->tableName} where email=:email");
            $cursor->execute([':email' => $email]);
            $user=$cursor->fetchObject($this->className);
            //4-Fermer la connexion
            parent::closeConnection();
            return  $user==false?null:$user;
        }
}