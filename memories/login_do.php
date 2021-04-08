<?php
require_once "config.php";

if(isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");

    if($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($password == $row['password']) {
            $_SESSION['memories_id'] = $row['id'];
            $_SESSION['memories_username'] = $username;
            header("Location: feed.php");
            die();
        }
        else {
            $_SESSION['memories_error'] = "Wrong Password";
            header("Location: login.php");
            die();
        }
    }
    else {
        $_SESSION['memories_error'] = "Wrong Username";
        header("Location: login.php");
        die();
    }
}
