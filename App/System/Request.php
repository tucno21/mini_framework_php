<?php

namespace App\System;

class Request
{
    public function getPath()
    {
        //captura el parametros despues de la url principal
        $path = $_SERVER['REQUEST_URI'];
        //captura solo antes del '?'
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return $path = substr($path, 0, $position);
    }

    public function methodWeb()
    {
        //captura y tipo de HTTP y convierte en minuscula
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
