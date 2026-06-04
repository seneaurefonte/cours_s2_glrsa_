<?php 
namespace App\Services;

use App\Entity\Taches;
use App\Repository\TacheRepository;

class TacheService{
    public static function addTache(Taches $taches):bool
    {
       return true;
    }

     public static function getAllTachesByUser(int $userId):array
     {
        return TacheRepository::getInstance()->selectAllByUser($userId);
        
    }

    
   
}