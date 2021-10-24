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
        $paramUrl = $this->request->getPath();
        $methodUrl = $this->request->methodWeb();

        if ($methodUrl === 'get') {
            //buscar si existe el array en getRoutes enviado $routes->get('/login', 'funcion');
            //para filtrar el segundo parametro por la captura del metodo
            $callback = $this->getRoutes[$paramUrl] ?? null;
        } else {
            $callback = $this->postRoutes[$paramUrl] ?? null;
        }

        //cuando los parametros no existe en el router error 404
        if ($callback == null) {
            echo 'la pagina no existe';
        }

        //Comprueba si una variable es de tipo string
        if (is_string($callback)) {
            echo 'es solo un string';
        }

        //comprueba si es un array
        if (is_array($callback)) {
            //convierte el primer string en objeto class
            // $callback[0] = new $callback[0];
            $this->controller = new $callback[0];
            $callback[0] = $this->controller;
            return call_user_func($callback);
        }

        //comprueba si es un objeto
        if (is_object($callback)) {
            // ejecuta la funcion callback
            return call_user_func($callback);
        }
    }
}
