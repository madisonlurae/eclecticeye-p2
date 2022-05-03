<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "eclectic-eye-login";

$connect = mysqli_connect($host, $user, $password,$dbname);
//check connection
if (!$connect) {
  die("Connection failed");
}