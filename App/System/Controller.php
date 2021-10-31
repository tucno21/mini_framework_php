<?php

namespace App\System;

use App\System\Router;
use App\System\Session;
use App\Library\Validation\Validation;

class Controller
{
    public function view($view, $data = [])
    {
        return Router::$routerApp->renderView($view, $data);
    }

    public function redirect($url)
    {
        if ($url == '/') {
            header("Location: $url");
        } else {
            header("Location: /$url");
        }
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

    /**conección de session **/

    public function session()
    {
        $sesion = new Session();
        return $sesion;
    }

    public function sessionSet(string $key, object $data)
    {
        return $this->session()->set($key, $data);
    }

    public function sessionGet(string $key)
    {
        return $this->session()->get($key);
    }

    public function sessionDestroy(string  $key)
    {
        return $this->session()->remove($key);
    }

    public function middleware($session, array $middleware)
    {
        $mw = new Middleware();
        $mw->run($session, $middleware);
    }
}
