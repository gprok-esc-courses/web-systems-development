<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');


require_once 'database.php';

$result = $pdo->query("SELECT id, task FROM tasks WHERE completed = 0");
$data = $result->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($data);
echo $json;

