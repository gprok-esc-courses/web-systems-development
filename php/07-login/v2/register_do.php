<?php
require_once "config.php";
$log = array();
if(isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $repeat = filter_var($_POST['repeat'], FILTER_SANITIZE_STRING);

    if(empty($username) || empty($email) ||
        empty($name) || empty($password)) {
        $error = "All values must be completed";
    }
    else if($password != $repeat) {
        $error = "Password does not much";
    }
    else {
        $result = $conn->query("SELECT * FROM users WHERE username='{$username}'");
        if($result->rowCount() > 0) {
            $error = "Username already in use";
        }
        else {
            // OK, register
            $encrypted = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(username, email, name, password)
                      VALUES('{$username}', '{$email}', 
                             '{$name}', '$encrypted')";
            $conn->exec($query);
            header("Location: login.php");
            die();
        }
    }
    $log['username'] = $username;
    $log['email'] = $email;
    $log['name'] = $name;
    $log['error'] = $error;
    $_SESSION['log'] = $log;
    header("Location: register.php");
    die();
}
else {
    echo "Invalid access";
}
