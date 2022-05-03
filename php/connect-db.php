<?php

session_start();

$host = "localhost";
$user = "onyx";
$password = "pandabear";
$dbname = "eclectic_eye_login";

$con = mysqli_connect($host, $user, $password, $dbname);
//check connection
if (!$con) {
  die("Connection failed");
}