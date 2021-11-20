<?php
require_once dirname(__DIR__) . '/System/Autoload.php';

use App\System\Router;
use App\Controller\Backend\Roles;
use App\Controller\Backend\Modulos;
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
$routes->get('/proles/create', [Roles::class, 'create']);
$routes->post('/proles/create', [Roles::class, 'create']);
$routes->get('/proles/edit', [Roles::class, 'edit']);
$routes->post('/proles/edit', [Roles::class, 'edit']);
$routes->get('/proles/delete', [Roles::class, 'destroy']);

$routes->get('/pmodulos', [Modulos::class, 'index']);
$routes->get('/pmodulos/create', [Modulos::class, 'create']);
$routes->post('/pmodulos/create', [Modulos::class, 'create']);
$routes->get('/pmodulos/edit', [Modulos::class, 'edit']);
$routes->post('/pmodulos/edit', [Modulos::class, 'edit']);
$routes->get('/pmodulos/delete', [Modulos::class, 'destroy']);


//ejecutar los los parametros enviados por get y post
$routes->checkRoutes();
