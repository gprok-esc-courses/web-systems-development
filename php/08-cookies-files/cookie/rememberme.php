<?php
$cookie_name = "testapp-visitor";
$cookie_value = filter_var($_POST['visitor'], FILTER_SANITIZE_STRING);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day

header("Location: home.php");
die();

