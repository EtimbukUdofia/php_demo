<?php

use core\Response;

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// switch ($uri){
// case "/":
// require "./controllers/index.php";
// break;
// case "/about":
// require "./controllers/about.php";
// break;
// case "/contact":
// require "./controllers/contact.php";
// break;
// default:
// echo "404 not found";
// }

$routes = require base_path("routes.php");

function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
  } else {
    abort();
  }
};

function abort($statusCode = Response::NOT_FOUND)
{
  http_response_code($statusCode);
  require base_path("./views/{$statusCode}.php");
  die();
};

routeToController($uri, $routes);
