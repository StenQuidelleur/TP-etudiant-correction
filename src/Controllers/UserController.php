<?php

namespace App\Controllers;

use App\Models\UserManager;
use App\Entity\User\Student;

class UserController extends AbstractController
{
    /**
     * List Users
     *
     * @return string
     */
    public function index(): string
    {
        $UserManager = new UserManager();
        $users = $UserManager->selectAll();

        return $this->render('User/index', ['users' => $users]);
    }

    /**
     * Show informations for a specific user
     * 
     * @param int $id
     * 
     * @return string
     */
    public function show(int $id): string
    {
        $userManager = new UserManager();
        $user = $userManager->selectOneById($id);

        return $this->render('User/show', ['user' => $user]);
    }

    /**
     * Edit a specific user
     * 
     * @param int $id
     * 
     * @return string|null
     */
    public function edit(int $id): ?string
    {
        $userManager = new UserManager();
        $user = $userManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $userData = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // transform data to object
            $user = new Student($userData['lastname'], $userData['firstname'], $userData['date_of_birth'], $userData['student_number']);

            // if validation is ok, update and redirection
            $userManager->update($user, $id);

            header('Location: /users/show?id=' . $id);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->render('User/edit', ['user' => $user]);
    }

    /**
     * Add a new user
     *
     * @return string|null
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $userData = array_map('trim', $_POST);
            
            // TODO validations (length, format...)

            // transform data to object
            $user = new Student($userData['lastname'], $userData['firstname'], $userData['date_of_birth'], $userData['student_number']);

            // if validation is ok, insert and redirection
            $userManager = new UserManager();
            $id = $userManager->insert($user);

            header('Location:/users/show?id=' . $id);
            return null;
        }

        return $this->render('User/create');
    }

    /**
     * Delete a specific user
     *
     * @return void
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $userManager = new UserManager();
            $userManager->delete((int)$id);

            header('Location:/users');
        }
    }

    /**
     * Connection
     * 
     * @param int $id
     * 
     * @return string
     */
    public function connection(int $id): string
    {
        $userManager = new UserManager();
        $userData = $userManager->selectOneById($id);

        $user = new Student($userData['lastname'], $userData['firstname'], $userData['date_of_birth'], $userData['student_number']);
        $info = 'Pour se connecter, l\'étudiant doit utiliser son nom et prénom (en minuscule, sans espace) pour Id et son numéro étudiant pour mot de passe.';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $connectionData = array_map('trim', $_POST);
            
            if (isset($connectionData['identification']) && $connectionData['identification'] === $user->getIdentification() 
                && isset($connectionData['password']) && $connectionData['password'] === $user->getPassword()) {
                    $info = 'success';
            } else {
                $info = $user->findLogin();
            }
        }
        
        return $this->render('User/connection', ['user' => $user, 'info' => $info]);
    }
}