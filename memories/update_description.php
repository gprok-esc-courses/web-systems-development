<?php
require_once "config.php";

$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

$conn->exec("UPDATE images SET description='$description' WHERE id=$id");

header("Location: profile.php");
die();
