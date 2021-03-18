<?php
session_start();

$conn = new PDO("mysql:host=localhost;dbname=php_memories",
    "test", "test");
