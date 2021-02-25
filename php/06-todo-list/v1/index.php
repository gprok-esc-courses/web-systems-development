<?php
require_once("database.php");

$sql = "SELECT * FROM tasks WHERE completed=0";
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
        <h1>Tasks</h1>
        <a href="completed.php">Completed Tasks</a>
    </header>

    <div style="padding-top: 20px">
        <form method="post" action="add_task.php">
            New Task: <input type="text" name="task"> <input type="submit">
        </form>

        <ol>
        <?php
        foreach ($result as $row) {
            echo "<li>" . $row['task'] .
                " <a href='complete_task.php?id=" . $row['id'] . "'>OK</a> 
                <a href='delete_task.php?id=" . $row['id'] . "'>X</a></li>";
        }
        ?>
        </ol>
    </div>

    <footer>
        <hr>
        Todo List &copy; 2021
    </footer>

</body>
</html>





