<?php 
namespace App\Controller;

use App\Services\DepartementService;
use App\Services\UserService;
use App\Views\AdminView;

class AdminController{
    public function  createDepartement():void{
              $departement= AdminView::saisieDepartement();
              DepartementService::addDepartement($departement);
    }

     public function  listDepartements():void{
                 $departements=DepartementService::getAllDepartements();
                AdminView::afiicheDepartement($departements);
    }

      public function  createUser():void{
                 $departements=DepartementService::getAllDepartements();
                 $user= AdminView::saisieUser($departements);
                 UserService::addUser($user);
    }


     public function  listUsers():void{
              $users=UserService::getAllUsers();
                AdminView::afficheUsers($users);
    }
}