<?php

session_start();

//if session exists, destroy session and redirect to index
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
}

header("Location: ../index.html");
die;