<?php
require_once dirname(__DIR__) . '/System/Autoload.php';

use App\System\Router;
use App\Controller\HomeController;

$routes = new Router();

//crear rutas get y post
$routes->get('/', [HomeController::class, 'home']);
$routes->get('/login', [HomeController::class, 'login']);
$routes->post('/login', [HomeController::class, 'login']);
$routes->get('/register', [HomeController::class, 'register']);
$routes->post('/register', [HomeController::class, 'register']);
$routes->get('/logout', [HomeController::class, 'logout']);
$routes->get('/dashboard', [HomeController::class, 'dashboard']);
$routes->get('/dashboard/prueba', [HomeController::class, 'prueba']);


//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
