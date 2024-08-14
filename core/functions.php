<?php

use core\Response;

function dumpAndDIe($value)
{
  echo "
<pre>";
  var_dump($value);
  echo "</pre>";
  die();
};

function UrlIs($value)
{
  return $_SERVER["REQUEST_URI"] === $value;
};

function abort($statusCode = Response::NOT_FOUND){
  http_response_code($statusCode);
  require base_path("./views/{$statusCode}.php");
  die();
}

function authorize($condition, $status = Response::FORBIDDEN){
  if(! $condition){
    abort($status);
  }
};

function base_path($path){
  return BASE_PATH . $path;
}

function view($path, $attributes = []){
  extract($attributes);
  return require base_path('views/' . $path);
}

function redirect($path){
  header("location: {$path}");
  exit();
}

function old($key, $default = ""){
  return core\Session::get("old")[$key] ?? $default;
  // same as saying $_SESSION["_flash"]["old"]["email"] ?? ""
}