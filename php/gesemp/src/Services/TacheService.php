<?php 
namespace App\Services;

use App\Entity\Taches;
use App\Repository\TacheRepository;

class TacheService{
    public static function addTache(Taches $taches):bool
    {

       return true;
    }

     public static function addAllTaches(array $taches,int $empId):bool
     {
        return TacheRepository::getInstance()->insertAll($taches,$empId)==0;
     }

     public static function getAllTachesByUser(int $userId):array
     {
        return TacheRepository::getInstance()->selectAllByUser($userId);
        
    }

    public static function generateCode():string{
    $lastTache= TacheRepository::getInstance()->selectByLastCode();
     $lastCode=$lastTache!=null?$lastTache->getCode():"T0000";
     $lastSequence=(int)substr($lastCode,1);//10
     $newSequence=$lastSequence+1;//11
     $nextCode="T".str_pad($newSequence,4,0,STR_PAD_LEFT);
      return $nextCode;
    }

    
   
}