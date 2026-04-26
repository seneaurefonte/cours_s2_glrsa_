<?php 
namespace App\Repository;

use App\Config\Database;
use App\Entity\User;

class UserRepository{
    public  function insert(User $user):int
    {
      $pdo= Database::getConnection();
        $cursor=$pdo->prepare("insert INTO users (nom,prenom,email,telephone) values (:nom,:prenom,:email,:telephone)" );
        $cursor->execute([
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':telephone' => $user->getTelephone()
        ]);
         //5-Renvoyer l'id de l'user inséré
        $lastInsertId = $pdo->lastInsertId();
        //4-Fermer la connexion
         Database::closeConnection();
         return $lastInsertId;
    }
    public function selectAll():array
    {
        $pdo = Database::getConnection();
        $cursor = $pdo->query("select * from users");
        $users=$cursor->fetchAll(\PDO::FETCH_CLASS,User::class);
        ///4-Fermer la connexion
         Database::closeConnection();
         return  $users;
    }

    public function selectById(int $id):?User
    {
        $pdo = Database::getConnection();
        $cursor = $pdo->prepare("select * from users where id=:id");
        $cursor->execute([':id' => $id]);
        $user=$cursor->fetchObject(User::class);
        ///4-Fermer la connexion
         Database::closeConnection();
         return  $user;
    }

    public function update(User $user):bool
    {
        $pdo = Database::getConnection();
        $cursor = $pdo->prepare("update users set nom=:nom, prenom=:prenom, email=:email, telephone=:telephone where id=:id");
        $result = $cursor->execute([
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':telephone' => $user->getTelephone(),
            ':id' => $user->getId()
        ]);
         //4-Fermer la connexion
         Database::closeConnection();
         return $result;
    }
}