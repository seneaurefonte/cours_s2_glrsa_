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

    
    public static function getDepartementById(int $id):?Departement
    {
        return DepartementRepository::getInstance()->selectById($id);
    }

     public static function getDepartementByCode(string $code):?Departement
    {
        return DepartementRepository::getInstance()->selectByCode($code);
    }
}