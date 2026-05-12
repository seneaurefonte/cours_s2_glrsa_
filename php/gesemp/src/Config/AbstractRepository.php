<?php 
namespace App\Config;
abstract class AbstractRepository{
    private  \PDO|null $pdo=null;
    protected function __construct()
    {

    }

    public  function getConnection():\PDO
    {
        try{
           $this->pdo = new \PDO("mysql:host=localhost:8889;dbname=gesemp_ism_glra_2026", "root", "root");
           
         }catch(\Exception $e){
            echo "Erreur de connection : ";
            echo $e->getMessage();
        }
         return $this->pdo;
    }

    public  function closeConnection():void
    {
        $this->pdo=null;
    }
}
