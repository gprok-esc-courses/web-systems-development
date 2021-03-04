<?php
require_once "config.php";

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

<?php require_once "partial_header.php"; ?>

    <h1>Dashboard</h1>
    <h2>Welcome <?=$_SESSION['username'];?></h2>
    <a href="logout.php">Logout</a>

<?php require_once "partial_footer.php"; ?>

