<?php 
namespace App\Entity;

use App\Repository\DepartementRepository;

class User{
    private int $id;
    private  string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
   //Mapper avec la table user en BD a l'objet User
    private int $departement_id;
    //Relation ManyToOne
    private ?Departement $departement=null;


    public function __construct()
    {
   
    }

   

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of departement
     */
    public function getDepartement(): Departement
    {
      if ($this->departement==null &&  isset($this->departement_id)) {
         $this->departement=DepartementRepository::getInstance()->selectById($this->departement_id);
      }
      return $this->departement; 
    }

    /**
     * Set the value of departement
     */
    public function setDepartement(Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get the value of departement_id
     */
    public function getDepartementId(): int
    {
        return $this->departement_id;
    }

    /**
     * Set the value of departement_id
     */
    public function setDepartementId(int $departement_id): self
    {
        $this->departement_id = $departement_id;

        return $this;
    }

    public function __toString():string 
    {
       return "Nom et Prenom : ".$this->nom." ".$this->prenom."Nom et Prenom : ".$this->getDepartement()->getNom()."\n";
    }
}