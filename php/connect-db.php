<?php
session_start();
$host = "143.198.12.22";
$user = "root";
$password = "pandabear";
$dbname = "eclectic-eye-login";

$connect = mysqli_connect($host, $user, $password,$dbname);
//check connection
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}