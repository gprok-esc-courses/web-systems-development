<?php
require_once "config.php";

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Dashboard</h1>
    <a href="logout.php">Logout</a>

</body>
</html>
