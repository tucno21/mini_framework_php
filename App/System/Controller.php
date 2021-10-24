<?php

namespace App\System;

use App\System\Router;

class Controller
{
    public function view($view, $data = [])
    {
        return Router::$routerApp->renderView($view, $data);
    }
}
