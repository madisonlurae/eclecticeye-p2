<?php 

session_start();

include("connect-db.php");

//make sure something was posted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//variables for the provided user, pass, first name, and last name
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];

	//make sure fields were not empty
	if (!empty($user_name) && !empty($password) && !empty($fname) && !empty($lname)) {
		//save to database
		$query = "insert into eclectic_eye_login (username,password,firstname,lastname) values ('$user_name','$password','$fname','$lname',)";
		mysqli_query($con, $query);
		//bring to login page on success
		header("Location: login-page.php");
		die;
	} else {
		echo "Please fill all fields";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Eclectic Eye</title>
    <link rel="stylesheet" href="/css/sharedstyle.css">
    <link rel="stylesheet" href="/css/loginstyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="/imgs/eclectic-eye-logo-icon.jpg"/>
    <script src="js/javascript.js"></script>
</head>

<header>
    <div id="menu">
        <div id="menu-bar-logo"><img id="menu-bar-logo" src="/imgs/eclectic-eye-logo-text.jpg" alt="eclectic eye logo"></div>
        <div id="nav-bar">
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../index.html">Home</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../about.html">About</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../contact.html">Contact</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../gallery.html">Gallery</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../purchaseform.html">Custom Candle Form</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="login-page.php">Login</a>
        </div>
    </div>
    <div id="menu-slide">
        <button class="hide-button" onclick="slideUpClass('nav-link'), slideUpID('menu');">Collapse</button>
        <button class="hide-button" onclick="slideDownClass('nav-link'), slideDownID('menu');">Expand</button>
    </div>
</header>

<body>
    <div class="flex-parent">
		<form method="post">
            <h2>Register</h2>
            <label>User Name</label>
            <input type="text" name="user_name" placeholder="Username"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <label>User Name</label>
            <input type="text" name="fname" placeholder="First Name"><br>
            <label>Password</label>
            <input type="text" name="lname" placeholder="Last Name"><br> 
            <button id="login-button" type="submit">Create Account</button>
        </form>
    </div>
</body>

<footer></footer>
</html>







