<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

require_once 'database.php';
$id = $_GET['tid'];

$stmt = $pdo->prepare("UPDATE tasks SET completed=0 WHERE id=?");
$stmt->bindParam(1, $id);
if($stmt->execute()) {
    echo json_encode("success");
}
else {
    echo json_encode("error");
}

