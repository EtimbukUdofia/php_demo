<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "core/functions.php";

spl_autoload_register(function($class){
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);  //DIRECTORY_SEPARATOR stands for / on Linux(LinuxMint)
  require base_path($class . ".php");
});

require base_path("core/router.php");

