<?php

namespace core\Middleware;

class Guest
{
  public function handle()
  {
    if ($_SESSION["user"] ?? false) {
      header("location: /");
      exit();
    }
  }
}
