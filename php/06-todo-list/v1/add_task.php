<?php
require_once("database.php");

$task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO tasks (task) VALUES ('$task')";
$conn->exec($sql);

header("Location: index.php");
die();
