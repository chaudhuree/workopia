<?php
require '../helper.php';
// require basePath('views/home.view.php');
// loadView('home');

$routes = [
  '/' => 'controllers/home.php',
  '/listings' => 'controllers/listings/index.php',
  '/listings/create' => 'controllers/listings/create.php',
  '404' => 'controllers/error/404.php',
];

$uri = $_SERVER['REQUEST_URI'];
// echo "path ".$uri;
if (array_key_exists($uri, $routes)) {
  require basePath($routes[$uri]);
} else {
  require basePath($routes['404']);
}