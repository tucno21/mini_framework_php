<?php

namespace App\System;

class Middleware
{
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function run($session, $restrictions)
    {

        if ($session === false) {

            $url = $this->request->getPath();
            $resp = array_search($url, $restrictions);

            //strstr estrae la cadena de texto de una parte de su busqueda
            $urlNotPermission = strstr($url, $restrictions[$resp], false);

            // if (is_int($resp)) {
            if ($urlNotPermission) {
                header("Location: /");
            }
        }
    }
}
