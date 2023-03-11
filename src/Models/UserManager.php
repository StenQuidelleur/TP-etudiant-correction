<?php

namespace App\Models;

use PDO;
use App\Entity\User\Student;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    /**
     * Insert new user in database
     * 
     * @param Student $user
     * 
     * @return int
     */
    public function insert(Student $user): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`firstname`, `lastname`, `date_of_birth`, `student_number`, `identification`, `password`) VALUES (:firstname, :lastname, :date_of_birth, :student_number, :identification, :password)");
        $statement->bindValue('firstname', $user->getPrenom(), PDO::PARAM_STR);
        $statement->bindValue('lastname', $user->getNom(), PDO::PARAM_STR);
        $statement->bindValue('date_of_birth', $user->getDateNaissance(), PDO::PARAM_STR);
        $statement->bindValue('student_number', $user->getNumeroEtudiant(), PDO::PARAM_STR);
        $statement->bindValue('identification', $user->getIdentification(), PDO::PARAM_STR);
        $statement->bindValue('password', $user->getPassword(), PDO::PARAM_STR);
        

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    
    /**
     * @param Student $user
     * @param int $id
     * 
     * @return bool
     */
    public function update(Student $user, int $id): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `firstname` = :firstname, `lastname` = :lastname, `date_of_birth` = :date_of_birth, `student_number` = :student_number, `identification` = :identification, `password` = :password  WHERE id=:id");
        $statement->bindValue('id', $id, PDO::PARAM_INT);
        $statement->bindValue('firstname', $user->getPrenom(), PDO::PARAM_STR);
        $statement->bindValue('lastname', $user->getNom(), PDO::PARAM_STR);
        $statement->bindValue('date_of_birth', $user->getDateNaissance(), PDO::PARAM_STR);
        $statement->bindValue('student_number', $user->getNumeroEtudiant(), PDO::PARAM_STR);
        $statement->bindValue('identification', $user->getIdentification(), PDO::PARAM_STR);
        $statement->bindValue('password', $user->getPassword(), PDO::PARAM_STR);

        return $statement->execute();
    }
}