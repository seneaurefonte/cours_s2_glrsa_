<?php 
require_once __DIR__."/Chambre.php";
class Categorie {
      private string $code;
     private string $nom;

     /*
       OneToMany
     */

    private array $chambres=[];

     public function __construct(
        ?string $code=null, ?string $nom=null
     )
     {
          $this->code = $code;
           $this->nom = $nom;
        
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

     /**
      * Get the value of nom
      */
     public function getNom(): string
     {
          return $this->nom;
     }

     /**
      * Set the value of nom
      */
     public function setNom(string $nom): self
     {
          $this->nom = $nom;

          return $this;
     }

     public function __toString()
     {
        return "Code :".$this->code." Nom :".$this->nom;
     }

    /**
     * Get the value of chambres
     */
    public function getChambres(): array
    {
        return $this->chambres;
    }

    public function addChambre(Chambre $chambre):void{
        $this->chambres[]= $chambre;
    }

    public function removeChambre(Chambre $chambre):void{
        //Programmation fonctionnelle
        $this->chambres= array_filter($this->chambres,function($val) use($chambre){
           return $val->getNumero()!=$chambre->getNumero();
        });

        //Programmation imperative

        $chambres=[];
        foreach ($this->chambres as  $val) {
            if($val->getNumero()!=$chambre->getNumero()){
                   $chambres[]=$val;
            }
        }
         $this->chambres=$chambres;

    }

}