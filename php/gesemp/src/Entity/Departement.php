<?php 
namespace App\Entity;
class Departement{
  private int $id;
  private string $code;
  private string $nom;


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
}