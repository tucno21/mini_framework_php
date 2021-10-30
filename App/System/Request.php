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

    public function isGet()
    {
        $data = [];
        if ($this->methodWeb() === 'get') {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if (!empty($_FILES)) {
            $data = array_merge($data, $_FILES);
        }

        return $data;
    }

    public function isPost()
    {
        $data = [];
        if ($this->methodWeb() === 'post') {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if (!empty($_FILES)) {
            $data = array_merge($data, $_FILES);
        }

        return $data;
    }
}
