<?php
require_once "config.php";
$log = array();
if(isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if(empty($username) || empty($password)) {
        $error = "All values must be completed";
    }
    else {
        $result = $conn->query("SELECT * FROM users WHERE username='{$username}'");
        if($result->rowCount() == 0) {
            $error = "Username is wrong";
        }
        else {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if(password_verify( $password, $row['password'])) {
                // OK. Proceed
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                die();
            }
            else {
                $error = "Password is wrong";
            }
        }
    }
    $log['username'] = $username;
    $log['error'] = $error;
    $_SESSION['log'] = $log;
    header("Location: login.php");
    die();
}
else {
    echo "Invalid access";
}
