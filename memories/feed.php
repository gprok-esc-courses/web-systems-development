<?php require_once "config.php"; ?>
<?php require_once "header.php"; ?>
<?php
    if(!isset($_SESSION['memories_id'])) {
        header("Location: login.php");
        die();
    }
?>

<h1>Feed</h1>
<?php
$result = $conn->query("SELECT * FROM images ORDER BY id DESC");

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<img src='images/" . $row['user_id'] . "/" . $row['filename'] . "' width='200px' />";
}
?>

<?php require_once "footer.php"; ?>