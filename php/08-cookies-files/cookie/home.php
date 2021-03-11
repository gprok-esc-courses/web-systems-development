<html>
<body>

<h1>Cookie setting</h1>
<?php
if(!isset($_COOKIE['testapp-visitor'])) {
    echo "<form method='POST' action='rememberme.php'>" .
         "<input type='text' placeholder='Your Name' name='visitor'>" .
         "<button type='submit'>Remember me</button></form>";
} else {
    echo "Welcome back " . $_COOKIE['testapp-visitor'];
    echo "<form method='POST' action='forgetme.php'>" .
         "<button type='submit'>Forget me</button></form>";
}
?>

</body>
</html>
