<?php

namespace App\Controller;

use App\Model\HomeModel;
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
        // return redirect('home');
        return $this->redirect('home');
        // return view('login');
    }

    public function register()
    {
        $db = new HomeModel();
        d($db);

        return view('register');
    }
}
