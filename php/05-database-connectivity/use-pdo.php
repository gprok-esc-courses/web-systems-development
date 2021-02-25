<?php
$dbuser = 'test';
$dbpass = 'test';
$pdo = new PDO('mysql:host=localhost;dbname=php_todo_simple',
    $dbuser, $dbpass);

$result = $pdo->query('SELECT * FROM tasks');

foreach ($result as $row) {
    echo $row['task'] . "<br>";
}

$pdo = null;
