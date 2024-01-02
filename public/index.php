<?php
// required the composer autoloader file
require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;

// require basePath('Framework/Router.php');
// require basePath('Framework/Database.php');

// custom autoloader
// spl_autoload_register(function ($class) {
//   require basePath('Framework/' . $class . '.php');
// });


// Instatiate the router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);
