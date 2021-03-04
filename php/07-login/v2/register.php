<?php
require_once "config.php";
if(isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
    $username = $log['username'];
    $email = $log['email'];
    $name = $log['name'];
    $error = $log['error'];

    unset($_SESSION['log']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Register</h1>

<?php
if(!empty($error)) {
    echo "<div style='color:red;'>$error</div>";
}
?>

<form method="post" action="register_do.php">
    <input name="username" type="text" placeholder="Username"
           value="<?=$username;?>"> <br>
    <input name="email" type="email" placeholder="Email"
           value="<?=$email;?>"> <br>
    <input name="name" type="text" placeholder="Full Name"
           value="<?=$name;?>"> <br>
    <input name="password" type="password" placeholder="Password"> <br>
    <input name="repeat" type="password" placeholder="Retype Password"> <br>
    <button type="submit" name="submit">Register</button>
</form>

</body>
</html>
