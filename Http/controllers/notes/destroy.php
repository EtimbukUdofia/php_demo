<?php

use core\App;
use core\Database;
$db = App::resolve(Database::class); // resolve("core\Database")

$currentUserId = 9;

$note = $db->query('select * from notes where id = :id', ["id" => $_POST['id']])->findOrFail();
authorize($note["user_id"] === $currentUserId);

$db->query('delete from notes where id = :id', ["id" => $_POST["id"]]);

header("location: /notes"); // redirect
exit();
