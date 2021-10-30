<?php

namespace App\System;

use App\System\Router;
use App\Library\Validation\Validation;

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
        $mm = new Validation;
        // return $mm->validate($inputs, $rules);
        return $mm->validate($inputs, $rules);
    }
    // public function validate($inputs, $rules)
    // {
    //     return Validation::validation($inputs, $rules);
    // }
}
