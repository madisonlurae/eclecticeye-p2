<?php

session_start();

//if session exists, destroy session and redirect to index
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
}

session_destroy();
header("Location: logout-success.php");
die;