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

            if (is_int($resp)) {
                // return view('error');
                header("Location: /");
            }
        }
    }
}
