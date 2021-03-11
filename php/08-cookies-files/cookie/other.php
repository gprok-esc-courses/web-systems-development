<html>
<body>

<h1>Cookie test</h1>
<h2>In another page</h2>
<?php
if(!isset($_COOKIE['testapp-visitor'])) {
    echo "Welcome alien";
} else {
    echo "Welcome " . $_COOKIE['testapp-visitor'];
}
?>

</body>
</html>
