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
        //check if username is already taken
        $query = "select * from users where username = '$user_name' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            header("Location: register-page.php?takenmsg=failed");
        } //check password against regex
        else if (!preg_match('^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,20}$',$password)) {
            header("Location: register-page.php?regmsg=failed");
        } else {
            //save to database
            $query = "INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`) VALUES ('$user_name', '$password', '$fname', '$lname')";
            mysqli_query($con, $query);
            //bring to login page on success
            header("Location: login-page.php");
            die;
        }
	} else {
		header("Location: register-page.php?fieldmsg=failed");
	}
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Eclectic Eye</title>
    <link rel="stylesheet" href="../css/sharedstyle.css">
    <link rel="stylesheet" href="../css/loginstyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="../imgs/eclectic-eye-logo-icon.jpg"/>
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
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="login-page.php">Account</a>
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
            <!--this will echo the fields are empty error msg-->
            <?php
                if (isset($_GET["fieldmsg"]) && $_GET["fieldmsg"] == 'failed') {
                    echo "Please fill all fields";
                }
            ?><br><br>
            <label>User Name</label>
            <input type="text" name="user_name" placeholder="Username"><br>
            <?php
                if (isset($_GET["takenmsg"]) && $_GET["takenmsg"] == 'failed') {
                    echo "Username is already taken";
                }
            ?><br><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <!--this will echo the regex error msg-->
            <?php
                if (isset($_GET["regmsg"]) && $_GET["regmsg"] == 'failed') {
                    echo "Password requirements not met:";
                    echo "at least one letter"; 
                    echo "at least one digit";
                    echo "only use special chars @#-_$%^&+=§!?";
                    echo "between 5 and 20 characters";
                }
            ?><br><br>
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First Name"><br><br><br>
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last Name"><br><br><br>
            <button id="login-button" type="submit">Create Account</button>
        </form>
    </div>
</body>

<footer></footer>
</html>







