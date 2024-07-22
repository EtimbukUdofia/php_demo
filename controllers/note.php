<?php

$config = require "./config.php";
$db = new Database($config["database"]);

$heading = "Note";

$id = $_GET['id'];
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ["id" => $id])->findOrFail();

authorize($note["user_id"] === $currentUserId);

require './views/note.view.php';
