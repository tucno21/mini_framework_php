<?php
require_once dirname(__DIR__) . '/System/Config.php';

use App\System\Router;

$routes = new Router();

//crear rutas get y post
$routes->get('/', [HomeController::class, 'home']);
$routes->get('/login', [HomeController::class, 'login']);
$routes->get('/register', [HomeController::class, 'register']);

$routes->get('/new', [new HomeController(), 'new']);
$routes->get('/string', 'texto');
$routes->get('/function', function () {
    echo 'hola';
});


//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
