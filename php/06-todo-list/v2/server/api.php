<?php
header('Content-type: application/json');
$pdo = new PDO('mysql:host=localhost;dbname=php_todo', 'root', 'root');
require_once "repository.php";

$action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
$api = new TaskAPI($pdo);
switch($action) {
    case "add":
        $title = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
        echo $api->addNew($title);
        break;
    case "all":
        echo $api->all();
        break;
    case "delete":
        break;
    default:
        break;
}