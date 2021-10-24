<?php

namespace App\System;

use App\System\Request;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    public Request $request;


    public function __construct()
    {
        $this->request = new Request();
    }


    //captura el $routes->get de INDEX y lo pasa al array $getRoutes
    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    //captura el $routes->post de INDEX y lo pasa al array $getRoutes
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }


    public function checkRoutes()
    {
        d($this->request->getPath());
        d($this->request->methodWeb());
    }
}
