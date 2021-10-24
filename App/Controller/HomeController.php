<?php

namespace App\Controller;

use App\System\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return $this->view('home');
    }

    public function login()
    {
        return $this->view('login');
    }

    public function register()
    {
        return $this->view('register');
    }
}
