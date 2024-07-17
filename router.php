<?php
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

$routes = [
  "/" => "controllers/index.php",
  "/about" => "controllers/about.php",
  "/notes" => "controllers/notes.php",
  "/contact" => "controllers/contact.php",
];


function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
  } else {
    abort();
  }
};

function abort($statusCode = 404)
{
  http_response_code($statusCode);
  require "./views/{$statusCode}.php";
  die();
};

routeToController($uri, $routes);
