<?php
require_once 'student_repository.php';

$category = $_GET['category'];

echo("<h1>Students, $category</h1>");

echo("<ul>");
foreach($students as $student) {
    if($student->major == $category || $category == 'ALL') {
        echo("<li>" . $student . "</li>");
    }
}
echo("</ul>");

