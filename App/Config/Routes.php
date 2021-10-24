<?php
require_once dirname(__DIR__) . '/System/Config.php';

use App\System\Router;

$routes = new Router();
$routes->hola();
