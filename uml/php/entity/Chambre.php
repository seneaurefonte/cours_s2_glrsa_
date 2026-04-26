<?php 
require_once __DIR__."/Categorie.php";
class Chambre {
      private string $code;
      private string $numero;
      /*
        Relation ManyToOne
      */
      private Categorie $categorie;

     public function __construct(
        ?string $code=null, ?string $numero=null,?Categorie $categorie
     )
     {
             $this->code = $code;
             $this->numero = $numero;
             $this->categorie = $categorie;
        
     }

      /**
       * Get the value of code
       */
      public function getCode(): string
      {
            return $this->code;
      }

      /**
       * Set the value of code
       */
      public function setCode(string $code): self
      {
            $this->code = $code;

            return $this;
      }

   

     public function __toString()
     {
        return "Code :".$this->code." Nom :".$this->numero;
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
       * Get the value of categorie
       */
      public function getCategorie(): Categorie
      {
            return $this->categorie;
      }

      /**
       * Set the value of categorie
       */
      public function setCategorie(Categorie $categorie): self
      {
            $this->categorie = $categorie;

            return $this;
      }
}