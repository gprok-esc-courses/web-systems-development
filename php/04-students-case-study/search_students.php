<?php
require_once 'student_repository.php';

$student_name = $_POST['student-name'];

echo("<h1>Students, named $student_name</h1>");

echo("<ul>");
$counter = 0;
foreach($students as $student) {
    if($student->first_name == $student_name) {
        echo("<li>" . $student . "</li>");
        $counter++;
    }
}
echo("</ul>");
if($counter == 0) {
    echo("<h3>No records found</h3>");
}

