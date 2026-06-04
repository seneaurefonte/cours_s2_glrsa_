<?php 
namespace App\Entity;

use App\Repository\UserRepository;

class Taches{
  private int $id;
  private string $code;
  private string $nom;
  private string $dateDebut;
  private string $dateFin;
  private int $user_id;
  //ManyToOne
  private ?User $user=null;
 


  /**
   * Get the value of id
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   */
  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
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
    return "Code :".$this->code." Nom :".$this->nom."\n";
  }

  /**
   * Get the value of dateDebut
   */
  public function getDateDebut(): string
  {
    return $this->dateDebut;
  }

  /**
   * Set the value of dateDebut
   */
  public function setDateDebut(string $dateDebut): self
  {
    $this->dateDebut = $dateDebut;

    return $this;
  }

  /**
   * Get the value of dateFin
   */
  public function getDateFin(): string
  {
    return $this->dateFin;
  }

  /**
   * Set the value of dateFin
   */
  public function setDateFin(string $dateFin): self
  {
    $this->dateFin = $dateFin;

    return $this;
  }

  /**
   * Get the value of user
   */
  public function getUser(): User
  {
     if ($this->user==null &&  isset($this->user_id)) {
         $this->user=UserRepository::getInstance()->selectById($this->user_id);
      }

    return $this->user;
  }

  /**
   * Set the value of user
   */
  public function setUser(User $user): self
  {
    $this->user = $user;

    return $this;
  }
}