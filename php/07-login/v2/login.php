<?php
require_once "config.php";
if(isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
    $username = $log['username'];
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
    <h1>Login</h1>

    <?php
    if(!empty($error)) {
        echo "<div style='color:red;'>$error</div>";
    }
    ?>

    <form method="post" action="login_do.php">
        <input name="username" type="text" placeholder="Username"
               value="<?=$username;?>"> <br>
        <input name="password" type="password" placeholder="Password"> <br>
        <button type="submit" name="submit">Login</button>
    </form>

</body>
</html>
