<?php

namespace App\Controller;

use App\System\Controller;

class HomeController extends Controller
{
    public function home()
    {

        return View('home', [
            'var' => 'es una variable',
        ]);
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
