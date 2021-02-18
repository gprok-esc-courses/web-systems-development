<?php

class Person {
    var $first_name;
    var $last_name;

    public function __construct($fname, $lname) {
        $this->first_name = $fname;
        $this->last_name = $lname;
    }

    public function __toString() {
        return $this->last_name . ', ' . $this->first_name;
    }
}

$person = new Person("John", "Doe");
echo($person);
echo("<br>");

class Student extends Person {
    var $major;

    public function set_major($major) {
        $this->major = $major;
    }

    public function __toString()
    {
        return parent::__toString() . " - studies: " . $this->major;
    }
}

$student = new Student("John", "Doe");
$student->set_major("Computer Science");
echo($student);