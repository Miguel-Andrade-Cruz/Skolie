<?php

namespace Minuz\Skolie\public;

use Minuz\Skolie\Controller\{
    Error404Controller
};

require_once __DIR__ . "/../vendor/autoload.php";
$routes = require_once __DIR__ . "/../config/routes/routes.php";



$pathInfo = $_SERVER['PATH_INFO'] ?? "/";
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

if (! array_key_exists($key, $routes)) {
    $controller = new Error404Controller();
} else {
    $controllerClass = $routes[$key];
    $controller = new $controllerClass();
}

$controller->requestProcessor();
