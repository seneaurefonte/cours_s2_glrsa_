<?php 
require_once dirname(__DIR__)."/entity/Compte.php";
class Authentification{
     private string $login;
     private string $password;
     private ?Compte $compte;
     public function __construct(string $login, string $password,?Compte $compte=null)
     {
        $this->login=$login;
        $this->password=$password;
        $this->compte=$compte;
     }


     /**
      * Get the value of login
      */
     public function getLogin(): string
     {
          return $this->login;
     }

     /**
      * Set the value of login
      */
     public function setLogin(string $login): self
     {
          $this->login = $login;

          return $this;
     }

     /**
      * Get the value of password
      */
     public function getPassword(): string
     {
          return $this->password;
     }

     /**
      * Set the value of password
      */
     public function setPassword(string $password): self
     {
          $this->password = $password;

          return $this;
     }

     /**
      * Get the value of compte
      */
     public function getCompte(): Compte
     {
          return $this->compte;
     }

     /**
      * Set the value of compte
      */
     public function setCompte(Compte $compte): self
     {
          $this->compte = $compte;
          return $this;
     }
}