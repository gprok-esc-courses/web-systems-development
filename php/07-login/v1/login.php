<?php
require_once "config.php";
$error = "";
if(isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if(empty($username) || empty($password)) {
        $error = "All values must be completed";
    }
    else {
        $result = $conn->query("SELECT * FROM users WHERE username='$username'");
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

    <form method="post" action="">
        <input name="username" type="text" placeholder="Username"
               value="<?=$username;?>"> <br>
        <input name="password" type="password" placeholder="Password"> <br>
        <button type="submit" name="submit">Login</button>
    </form>

</body>
</html>
