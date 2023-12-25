<?php
$routes = require basePath('routes.php');

if (array_key_exists($uri, $routes)) {
  require basePath($routes[$uri]);
} else {
  require basePath($routes['404']);
}