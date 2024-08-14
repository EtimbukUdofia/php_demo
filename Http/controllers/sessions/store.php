<?php

use core\Authenticator;
use core\Session;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate($email, $password)) {
  if ((new Authenticator)->attempt($email, $password)) {
    redirect("/");
  }

  $form->error("main", "Username or password invalid");
}

Session::flash("errors", $form->errors());
Session::flash('old', [
  "email" => $_POST["email"]
]);

return redirect("/login");