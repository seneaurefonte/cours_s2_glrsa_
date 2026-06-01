<?php 
namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService{

private function  __construct()
{

}
 public static function addUser(User $user):bool
{
      
        return UserRepository::getInstance()->insert($user)!=0;
}

public static function getAllEmployes():array
{
         return UserRepository::getInstance()->selectAll(); 
        
}

public static function getUserById(int $id):?User
{
    return UserRepository::getInstance()->selectById($id);
  
}

public static function getUserByEmail(string $email):?User
{
    return UserRepository::getInstance()->selectByEmail($email);
}


}