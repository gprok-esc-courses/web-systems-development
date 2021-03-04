<?php
require_once "config.php";
$log = array();
if(isset($_POST['submit'])) {
    $log['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $log['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $log['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $repeat = filter_var($_POST['repeat'], FILTER_SANITIZE_STRING);

    if(empty($log['username']) || empty($log['email']) ||
        empty($log['name']) || empty($password)) {
        $log['error'] = "All values must be completed";
    }
    else if($password != $repeat) {
        $log['error'] = "Password does not much";
    }
    else {
        $result = $conn->query("SELECT * FROM users WHERE username='{$log['username']}'");
        if($result->rowCount() > 0) {
            $log['error'] = "Username already in use";
        }
        else {
            // OK, register
            $encrypted = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(username, email, name, password)
                      VALUES('{$log['username']}', '{$log['email']}', 
                             '{$log['name']}', '$encrypted')";
            $conn->exec($query);
            header("Location: login.php");
            die();
        }
    }
    $_SESSION['log'] = $log;
    header("Location: register.php");
    die();
}
else {
    echo "Invalid access";
}
