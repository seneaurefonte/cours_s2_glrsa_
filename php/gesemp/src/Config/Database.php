<?php 
namespace App\Config;
class Database{
    private static \PDO|null $pdo=null;
    private function __construct()
    {

    }

    public static function getConnection():\PDO
    {
        try{
           self::$pdo = new \PDO("mysql:host=localhost:8889;dbname=gesemp_ism_glra_2026", "root", "root");
           
         }catch(\Exception $e){
            echo "Erreur de connection : ";
            echo $e->getMessage();
        }
         return self::$pdo;
    }

    public static function closeConnection():void
    {
        self::$pdo=null;
    }
}
