<?php

class Student {
    var $last_name;
    var $first_name;
    var $major;

    public function __construct($lname, $fname, $major) {
        $this->last_name = $lname;
        $this->first_name = $fname;
        $this->major = $major;
    }

    public function __toString() {
        return $this->last_name . ', ' . $this->first_name . ': ' . $this->major;
    }
}
