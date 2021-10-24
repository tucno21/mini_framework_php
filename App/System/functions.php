<?php
require_once dirname(__DIR__) . '/Config/App.php';

//debugear sin continuar con otros codigos de linea
function dd($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//debugear continuando las lineas de codigo
function d($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

//url de la web
define('base_url', $baseURL);

//funcion url con parametros
function base_url($parameters = null)
{
    return base_url . $parameters;
}
