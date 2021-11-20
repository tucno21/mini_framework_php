<?php

namespace App\Controller\Frontend;

use App\System\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function home()
    {
        // $session = $this->sessionGet('user');

        return view('frontend/home', [
            'var' => 'es una variable',
        ]);
    }
}
