<?php

namespace App\Controller;

use App\System\Router;

class HomeController
{
    public function home(Router $router)
    {
        $router->renderView('home', [
            'hola' => 'hola como estas',
            'hola2' => 'hola como estas 2',
        ]);
    }

    public function login(Router $router)
    {
        $router->renderView('login');
    }

    public function register(Router $router)
    {
        $router->renderView('register');
    }
}
