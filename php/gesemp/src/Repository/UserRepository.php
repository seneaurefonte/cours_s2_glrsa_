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
    }
    public  function insert(User $user):int
    {
      $pdo= parent::getConnection();
        $cursor=$pdo->prepare("insert INTO users (nom,prenom,email,telephone,departement_id) values (:nom,:prenom,:email,:telephone,:departementId)" );
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
    public  function selectAll():array
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->query("select * from users");
        $users=$cursor->fetchAll(\PDO::FETCH_CLASS,User::class);
        ///4-Fermer la connexion
         parent::closeConnection();
         return  $users;
    }

    public   function selectById(int $id):?User
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("select * from users where id=:id");
        $cursor->execute([':id' => $id]);
        $user=$cursor->fetchObject(User::class);
        ///4-Fermer la connexion
         parent::closeConnection();
         return  $user;
    }

    public  function update(User $user):bool
    {
        $pdo = parent::getConnection();
        $cursor = $pdo->prepare("update users set nom=:nom, prenom=:prenom, email=:email, telephone=:telephone where id=:id");
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
}