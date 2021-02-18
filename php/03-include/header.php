<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logo - <?=$title;?></title>
</head>
<body>

<h1>LOGO</h1>
<div>
    <ul>
        <li>
            <?php if($title == "Home") {?>
            <a href="home.php">Home</a>
            <?php } else {?>
            Home
            <?php } ?>
        </li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</div>
