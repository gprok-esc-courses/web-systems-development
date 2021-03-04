<?php
require_once "config.php";
$error = "";
if(isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $repeat = filter_var($_POST['repeat'], FILTER_SANITIZE_STRING);

    if(empty($username) || empty($email) || empty($name) || empty($password)) {
        $error = "All values must be completed";
    }
    else if($password != $repeat) {
        $error = "Password does not much";
    }
    else {
        $result = $conn->query("SELECT * FROM users WHERE username='$username'");
        if($result->rowCount() > 0) {
            $error = "Username already in use";
        }
        else {
            // OK, register
            $encrypted = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users(username, email, name, password)
                      VALUES('$username', '$email', '$name', '$encrypted')";
            $conn->exec($query);
            header("Location: login.php");
            die();
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
<h1>Register</h1>

<?php
if(!empty($error)) {
    echo "<div style='color:red;'>$error</div>";
}
?>

<form method="post" action="register.php">
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
