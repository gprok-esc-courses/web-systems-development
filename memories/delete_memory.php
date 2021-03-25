<?php
require_once "config.php";

$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

$result = $conn->query("SELECT * FROM images where id=$id");
$row = $result->fetch(PDO::FETCH_ASSOC);
$filename = $row['filename'];

$conn->exec("DELETE FROM images WHERE id=$id AND user_id={$_SESSION['memories_id']}");

// Delete the file
$filepath = "images/{$_SESSION['memories_id']}/$filename";
unlink($filepath);

header("Location: profile.php");
die();

