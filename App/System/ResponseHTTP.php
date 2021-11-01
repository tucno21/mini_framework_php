<?php

namespace App\System;

class ResponseHTTP
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}
