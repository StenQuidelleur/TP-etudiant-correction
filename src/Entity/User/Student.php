<?php

namespace App\Entity\User;

class Student extends AbstractUser implements AuthenticateInterface
{
    public const TYPE_OF_USER = 'Etudiant';

    /**
     * @var string
     */
    protected string $numeroEtudiant;

    /**
     * @param string $nom
     * @param string $prenom
     * @param string $dateNaissance
     * @param string $numeroEtudiant
     */
    public function __construct(string $nom, string $prenom, string $dateNaissance, string $numeroEtudiant) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->numeroEtudiant = $numeroEtudiant;
    }

    /**
     * @return string
     */
    public function getNumeroEtudiant(): string 
    {
        return $this->numeroEtudiant;
    }

    /**
     * @param string $numeroEtudiant
     * 
     * @return void
     */
    public function setNumeroEtudiant(string $numeroEtudiant): void
    {
        $this->numeroEtudiant = $numeroEtudiant;
    }

    /**
     * @return string
     */
    public function findLogin(): string
    {
        return 'Pour se connecter, l\'étudiant doit utiliser son nom et prénom (en minuscule, sans espace) pour Id: ' . $this->getIdentification() . ' et son numéro étudiant pour mot de passe: ' . $this->getPassword();
    }

    /**
     * @return string
     */
    public function getIdentification(): string
    {
        return strtolower($this->nom.$this->prenom);
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->numeroEtudiant;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->formatAge($this->getDateNaissance()). 'ans';
    }

    /**
     * @param string $studentAge
     * 
     * @return int
     */
    private function formatAge(string $studentAge): int
    {
        return date("Y") - intval(substr($studentAge, 0, 4));
    }
}