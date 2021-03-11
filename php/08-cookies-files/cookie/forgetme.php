<?php
// set the expiration date to one hour ago
setcookie('testapp-visitor', "", time() - 3600);

header("Location: home.php");
die();
?>


