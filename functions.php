<?php

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

function authorize($condition, $status = Response::FORBIDDEN){
  if(! $condition){
    abort($status);
  }
};