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
  header("location: /");
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






// use core\App;
// use core\Database;
// use core\Validator;

// require base_path('core/Validator.php');

// $db = App::resolve(Database::class);

// $errors = [];

// if (!Validator::string($_POST["body"], 1, 500)) {
//   $errors["body"] = "A body of no more than 500 characters is required";
// }

// if (!empty($errors)) {
//   return view("notes/create.view.php", [
//     "heading" => "Create Note",
//     "errors" => $errors,
//   ]);
// }

// $body = $_POST["body"];
// $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', ["body" => $body, "user_id" => 1]);
// header("location: /notes");
// die();