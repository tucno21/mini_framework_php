<?php
require_once dirname(__DIR__) . '/System/Autoload.php';

use App\System\Router;
use App\Controller\Backend\Roles;
use App\Controller\Backend\Dashboard;
use App\Controller\Auth\AuthController;
use App\Controller\Frontend\HomeController;



$routes = new Router();

//crear rutas get y post
$routes->get('/', [HomeController::class, 'home']);

$routes->get('/login', [AuthController::class, 'login']);
$routes->post('/login', [AuthController::class, 'login']);
$routes->get('/register', [AuthController::class, 'register']);
$routes->post('/register', [AuthController::class, 'register']);
$routes->get('/logout', [AuthController::class, 'logout']);


$routes->get('/panelcontrol', [Dashboard::class, 'index']);
// $routes->get('/dashboard/prueba', [DashboardController::class, 'prueba']);

$routes->get('/proles', [Roles::class, 'index']);


//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
