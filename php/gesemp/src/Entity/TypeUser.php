<?php 
namespace App\Entity;
enum TypeUser:string{
   Case ADMIN="ADMIN";
   Case CHEF="CHEF";
   Case EMPLOYESIMPLE="EMPLOYESIMPLE";

  public static function fromString(string $value) : TypeUser
  {
    return match($value) {
      'ADMIN' => self::ADMIN,
      'CHEF' => self::CHEF,
      'EMPLOYESIMPLE' => self::EMPLOYESIMPLE,
      default => throw new \InvalidArgumentException("Invalid value for TypeUser"),
    };
  }
}