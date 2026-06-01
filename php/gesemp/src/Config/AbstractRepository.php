<?php 
namespace App\Config;
abstract class AbstractRepository{
    protected string $tableName;
     protected string $className;
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

    public  function selectAll():array
    {
        $pdo = $this->getConnection();
        $cursor = $pdo->query("select * from {$this->tableName}");
        $users=$cursor->fetchAll(\PDO::FETCH_CLASS,$this->className);
        ///4-Fermer la connexion
        $this->closeConnection();
         return  $users;
    }
    //selectById
    //insert
    //update
    //delete
    //count

}
