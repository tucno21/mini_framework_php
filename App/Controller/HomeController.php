<?php

namespace App\Controller;

use App\System\Controller;

class HomeController extends Controller
{
    public function home()
    {

        return view('home', [
            'var' => 'es una variable',
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
