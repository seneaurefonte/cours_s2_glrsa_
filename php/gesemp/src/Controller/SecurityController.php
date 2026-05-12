<?php 
namespace App\Controller;
class SecurityController{
    public function login():void{
        require_once dirname(__DIR__)."/Views/security/login.php"; 
    }

     public function logout():void{
    
    }
}   