<?php

use core\Session;

view("sessions/create.view.php", [
  "errors" => Session::get("errors")
]);