<?php

namespace App\System;

class Model
{
    protected static $db;

    // Definir la conexión a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }
}
