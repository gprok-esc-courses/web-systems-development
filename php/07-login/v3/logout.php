<?php
require_once "config.php";

unset($_SESSION['username']);

header("Location: index.php");
die();
