<style>
    img {
        padding-right: 5px;
    }
</style>

<h1>Gallery</h1>
<a href="home.php">Add new image</a>
<div>
<?php
$images = glob("uploads/*.*");

foreach($images as $image) {
    echo '<img width="120" src="'.$image.'" />';
}
?>
</div>
