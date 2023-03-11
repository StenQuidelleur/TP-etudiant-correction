<?php

namespace App\Entity\User;

abstract class AbstractUser
{
    /**
     * @var string
     */
    protected string $nom;

    /**
     * @var string
     */
    protected string $prenom;

    /**
     * @var string
     */
    protected string $dateNaissance;

    /**
     * @param string $nom
     * @param string $prenom
     * @param string $dateNaissance
     */
    public function __construct(string $nom, string $prenom, string $dateNaissance) 
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * 
     * @return void
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * 
     * @return void
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getDateNaissance(): string 
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $dateNaissance
     * 
     * @return void
     */
    public function setDateNaissance(string $dateNaissance): void 
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return string
     */
    abstract public function findLogin(): string;
}