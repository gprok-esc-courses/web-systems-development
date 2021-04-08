<?php require_once "config.php"; ?>
<?php require_once "header.php"; ?>
<?php
if(!isset($_SESSION['memories_id'])) {
    header("Location: login.php");
    die();
}
?>

<h1>Profile of <?=$_SESSION['memories_username'];?></h1>

<div style="border: solid 1px black;">
<form method="post" action="add_memory.php" enctype="multipart/form-data">
    <input type="file" name="memory">
    <textarea name="description"></textarea>
    <input type="submit" value="Add">
</form>
</div>

<?php
$result = $conn->query("SELECT * FROM images WHERE user_id={$_SESSION['memories_id']} ORDER BY id DESC");

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>
            <img src='images/{$row['user_id']}/{$row['filename']}' width='200px' /><br>
            <form method='post' action='delete_memory.php'>
                <input type='text' name='id' value='{$row['id']}' hidden>
                <input type='submit' value='Delete'>
            </form>
            <form method='post' action='update_description.php'>
            <input type='text' name='id' value='{$row['id']}' hidden>
            <textarea name='description'>{$row['description']}</textarea>
            <br><input type='submit' value='Update'>
            </form>
          </div>";
}
?>

<?php require_once "footer.php"; ?>
