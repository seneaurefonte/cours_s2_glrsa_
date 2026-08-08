<?php 
namespace App\Config;
class Validator{
  private static  array $errors=[];

   public static function isEmpty(string $data,string $key,string $sms="Ce Champest obligatoire"){
               if (empty($data)) {
                self::$errors[$key]=$sms;
               }
   }

    public static function getErrors():array{
    return self::$errors;
   }
   public static function validate():bool{
       return  count(self::$errors)==0;
   }

}