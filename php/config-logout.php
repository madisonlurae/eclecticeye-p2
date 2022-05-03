<?php 
session_start();
session_unset();
//destroy session and redirect to index
session_destroy();
header("Location: ../index.html");