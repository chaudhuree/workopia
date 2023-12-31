<?php
require '../helper.php';
// db connection
require basePath('Database.php');
$config = require basePath('config/db.php');

$db = new Database($config);
//  db connection
require basePath('Router.php');

$router = new Router();

$routes = require basePath('routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
