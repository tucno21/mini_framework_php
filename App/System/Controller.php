<?php

namespace App\System;

use App\System\Router;

class Controller
{
    public function view($view, $data = [])
    {
        return Router::$routerApp->renderView($view, $data);
    }

    public function redirect($view, $data = [])
    {
        return Router::$routerApp->renderView($view, $data);
    }

    public function request()
    {
        return Router::$routerApp->request;
    }

    public function validate($inputs, $rules)
    {
        $data = new Validation;
        return $data->validate($inputs, $rules);
    }
}
