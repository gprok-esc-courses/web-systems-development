<?php
$dbhost = 'localhost';
$dbuser = 'test';
$dbpass = 'test';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($conn, 'php_todo_simple');

$result = mysqli_query($conn, 'SELECT * FROM tasks');
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['task'] . "<br>";
    }
}
mysqli_close($conn);
