<?php

namespace App\Controllers;

class HomeController extends AbstractController
{
    /**
     * Homepage
     *
     * @return string
     */
    public function index(): string
    {
        return $this->render('Home/home');
    }
}