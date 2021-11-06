<?php

require_once dirname(__DIR__) . '/Config/App.php';

use App\System\Router;

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
//ruta de documento public
define('DIRPUBLIC', $_SERVER['DOCUMENT_ROOT']);

//ruta de documento public/imagens
define('DIRIMG', $_SERVER['DOCUMENT_ROOT'] . "/$imageFolder/");

//ruta padre de este archivo
define('APPDIR', dirname(__DIR__));

//funcion para extender partes de php layout
function extend($dirView)
{
    include APPDIR . '/View' . $dirView;
}

//agregando funcion de render de vista
if (!function_exists('view')) {

    function view(string $name, array $data = [])
    {
        return Router::$routerApp->renderView($name, $data);
    }
}

//funcion de redireccionamiento
if (!function_exists('redirect')) {
    function redirect(string $name, array $data = [])
    {
        if (!empty($name)) {
            return Router::$routerApp->renderView($name, $data);
        }
    }
}
