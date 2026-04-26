<?php 
require_once dirname(__DIR__)."/entity/Authentification.php";
class Compte{
      protected string $numero;
      protected string $titulaire;
      protected float $solde;
      private Authentification $authentification;



      public function __construct(string $numero,string $titulaire,float $solde)
      {
             $this->numero=$numero;
             $this->titulaire=$titulaire;
             $this->solde=$solde;
      }

      /**
       * Get the value of numero
       */
      public function getNumero(): string
      {
            return $this->numero;
      }

      /**
       * Set the value of numero
       */
      public function setNumero(string $numero): self
      {
            $this->numero = $numero;

            return $this;
      }

      /**
       * Get the value of titulaire
       */
      public function getTitulaire(): string
      {
            return $this->titulaire;
      }

      /**
       * Set the value of titulaire
       */
      public function setTitulaire(string $titulaire): self
      {
            $this->titulaire = $titulaire;

            return $this;
      }

      /**
       * Get the value of solde
       */
      public function getSolde(): float
      {
            return $this->solde;
      }

      /**
       * Set the value of solde
       */
      public function setSolde(float $solde): self
      {
            $this->solde = $solde;

            return $this;
      }

      /**
       * Get the value of authentification
       */
      public function getAuthentification(): Authentification
      {
            return $this->authentification;
      }

      /**
       * Set the value of authentification
       */
      public function setAuthentification(Authentification $authentification): self
      {
            $this->authentification = $authentification;

            return $this;
      }
}