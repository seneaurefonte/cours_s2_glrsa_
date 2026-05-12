<?php 
namespace App\Services;
use App\Entity\Departement;
use App\Repository\DepartementRepository;

class DepartementService{
    public static function addDepartement(Departement $departement):bool
    {
        return DepartementRepository::getInstance()->insert($departement)!=0;
    }

     public static function getAllDepartements():array
     {
        return DepartementRepository::getInstance()->selectAll();
        
    }
}