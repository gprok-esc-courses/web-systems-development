<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once 'database.php';
$tid = $_GET['tid'];

$stmt = $pdo->prepare("UPDATE tasks SET completed = 1 WHERE id=?");
$stmt->bindParam(1, $tid);
if($stmt->execute()) {
    echo json_encode("success");
}
else {
    echo json_encode("error");
}
