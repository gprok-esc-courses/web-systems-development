<?php require_once "config.php"; ?>
<?php require_once "header.php"; ?>
<?php
    if(!isset($_SESSION['memories_id'])) {
        $_SESSION['memories_error'] = "You have to login first";
        header("Location: login.php");
        die();
    }
?>

<h1>Feed</h1>
<?php
$result = $conn->query("SELECT * FROM images 
                        INNER JOIN users ON images.user_id = users.id
                        ORDER BY images.id DESC");

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
    echo "<div>
            
            <img src='images/" . $row['user_id'] . "/" . $row['filename'] . "' width='200px' />
            <span>" . $row['id'] . $row['username'] . "</span>
          </div>";

}
?>

<?php require_once "footer.php"; ?>