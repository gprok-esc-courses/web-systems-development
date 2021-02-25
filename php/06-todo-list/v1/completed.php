<?php
require_once("database.php");

$sql = "SELECT * FROM tasks WHERE completed=1";
$result = $conn->query($sql, PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO LIST</title>
</head>
<body>
    <header>
        <h1>Completed Tasks</h1>
        <a href="index.php">Home</a>
    </header>

    <ol>
    <?php
    foreach ($result as $row) {
        echo "<li><del>" . $row['task'] .
            "</del> <a href='undo_task.php?id=" . $row['id'] . "'>Undo</a> 
            <a href='delete_task.php?id=" . $row['id'] . "'>Del</a></li>";
    }
    ?>
    </ol>

    <footer>
        <hr>
        Todo List &copy; 2021
    </footer>

</body>
</html>





