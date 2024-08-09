<?php

use core\App;
use core\Database;
use core\Validator;


$email = $_POST["email"];
$password = $_POST["password"];

// validate the form inputs.
$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = "Please provide a password of at least 7 characters";
}

if (!empty($errors)) {
  return view("registration/create.view.php", [
    "errors" => $errors
  ]);
}


$db = App::resolve(Database::class);
//check if there is an existing user
$user = $db->query('select * from users where email = :email', [
  'email' => $email
])->find();

// if yes, redirect to login page
if ($user) {
  // that user already exists
  header("location: /"); //redirect to login page
  exit();
} else {
  // if no, save one to db and then log the user in and redirect
  $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
    'email' => $email,
    'password' => $password
  ]);

  // alert user logged in
  $_SESSION["user"] = [
    "email" => $email
  ];

  header("location: /");
  exit();
}