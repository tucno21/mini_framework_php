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

    public function login()
    {
        echo 'desde el login';
    }

    public function register()
    {
        echo 'desde el registro';
    }
}
