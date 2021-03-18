<?php require_once "config.php"; ?>
<?php
    unset($_SESSION['memories_id']);
    unset($_SESSION['memories_username']);
    header("Location: index.php");
    die();
?>
