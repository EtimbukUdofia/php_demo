<?php

use core\App;
use core\Database;
use core\Validator;

require base_path('core/Validator.php');

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST["body"], 1, 500)) {
  $errors["body"] = "A body of no more than 500 characters is required";
}

if (!empty($errors)) {
  return view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors,
  ]);
}

$body = $_POST["body"];
$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', ["body" => $body, "user_id" => 9]);
header("location: /notes");
die();
