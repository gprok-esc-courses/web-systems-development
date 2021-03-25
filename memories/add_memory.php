<?php
require_once "config.php";

$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
$upload_dir = "images/" . $_SESSION['memories_id'] . "/";
$upload_file = $upload_dir . basename($_FILES["memory"]["name"]);
$ok = true;
$max_size = 500000; // 500kb
$extension = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
$message = "";

// Is it an image file?
if(isset($_POST["submit"])) {
    $imageData = getimagesize($_FILES["memory"]["tmp_name"]);
    if($imageData !== false) {
        $message = "File ". basename( $_FILES["memory"]["name"]) .
            ", type: " . $imageData["mime"];
        $ok = true;
    } else {
        $message .= "ERROR: File is not an image<br>";
        $ok = false;
    }
}

if (file_exists($upload_file)) {
    $message .= "ERROR: File already exists<br>";
    $ok = false;
}

if ($_FILES["memory"]["size"] > $max_size) {
    $message .= "Error: file is too large ({$_FILES["memory"]["size"]}) 500kb limit<br>";
    $ok = false;
}

if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
    && $extension != "gif" ) {
    $message .= "ERROR: only JPG, JPEG, PNG & GIF images supported<br>";
    $ok = false;
}


if (!$ok) {
    echo $message;
} else {
    if (move_uploaded_file($_FILES["memory"]["tmp_name"], $upload_file)) {
        $conn->exec("INSERT INTO images (filename, description, user_id)
                        VALUES ('{$_FILES["memory"]["name"]}', '$description', {$_SESSION['memories_id']})");
    }

    header("Location: profile.php");
    die();
}
?>

