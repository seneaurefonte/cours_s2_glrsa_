<?php 
namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService{

 public static function addUser(User $user):bool
{
        return UserRepository::insert($user)!=0;
}

 public static function getAllEmployes():array
     {
        return UserRepository::selectAll();
        
    }
  
}