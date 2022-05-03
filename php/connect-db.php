<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "eclectic-eye-login";

$con = mysqli_connect($host, $user, $password,$dbname);
//check connection
if (!$con) {
  die("Connection failed");
}