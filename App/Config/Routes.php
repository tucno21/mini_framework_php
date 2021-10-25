<?php
require_once dirname(__DIR__) . '/System/Autoload.php';

use App\System\Router;
use App\Controller\HomeController;

$routes = new Router();

//crear rutas get y post
$routes->get('/', [HomeController::class, 'home']);
$routes->get('/login', [HomeController::class, 'login']);
$routes->get('/register', [HomeController::class, 'register']);
$routes->post('/register', [HomeController::class, 'register']);


//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
