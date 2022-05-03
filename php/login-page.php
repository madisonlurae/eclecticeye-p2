<?php 

session_start();

    include("connect-db.php");

    //declaring global var so username can be pulled in other files
    $user_data;
    $_SESSION['user'];

    //first things first, if already logged in, redirect to account page 
    if (isset($_SESSION['user'])) {
        header("Location: ../account.html");
    }

    //make sure form was posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //variables for the provided user and pass
        echo "posted";
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        //make sure fields were not empty
        if (!empty($user_name) && !empty($password)) {
            //get user from database that matches username
            $query = "select * from users where username = '$user_name' limit 1";
            $result = mysqli_query($con, $query);
            
            //if username exists
            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {
                    //array with users info
                    $user_data = mysqli_fetch_assoc($result);
                    //if correct password is given
                    if ($user_data['password'] === $password) {
                        //start session and redirect
                        $_SESSION['user'] = $user_data['username'];
                        header("Location: login-success.php");
                        die;
                    } else {
                        header("Location: login-page.php?passmsg=failed");
                    }
                }
            }
            //reaches here if username is not found
            header("Location: login-page.php?usrmsg=failed");
        //reaches here if fields were empty
        } else {
            header("Location: login-page.php?fieldmsg=failed");
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Eclectic Eye</title>
    <link rel="stylesheet" href="/../css/sharedstyle.css">
    <link rel="stylesheet" href="/../css/loginstyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="../imgs/eclectic-eye-logo-icon.jpg"/>
    <script src="/../js/javascript.js"></script>
</head>

<header>
    <div id="menu">
        <div id="menu-bar-logo"><img id="menu-bar-logo" src="/imgs/eclectic-eye-logo-text.jpg" alt="eclectic eye logo"></div>
        <div id="nav-bar">
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../index.html">Home</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../about.html">About</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../contact.html">Contact</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="../gallery.html">Gallery</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="purchaseform.php">Custom Candle Form</a>
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
            <h2>Login</h2>
            <!--this will echo the fields are empty error msg-->
            <?php
                if (isset($_GET["fieldmsg"]) && $_GET["fieldmsg"] == 'failed') {
                    echo "Please fill all fields";
                }
            ?><br><br>
             <?php
                if (isset($_GET["loginmsg"]) && $_GET["loginmsg"] == 'failed') {
                    echo "Must be logged in to order";
                }
            ?>
            <label>Username</label>
            <input type="text" name="user_name" placeholder="Username"><br>
            <!--this will echo the invalid username error msg-->
            <?php
                if (isset($_GET["usrmsg"]) && $_GET["usrmsg"] == 'failed') {
                    echo "Invalid username";
                }
            ?><br><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br> 
            <!--this will echo the incorrect password error msg-->
            <?php
                if (isset($_GET["passmsg"]) && $_GET["passmsg"] == 'failed') {
                    echo "Password is incorrect";
                }
            ?><br><br>
            <button id="login-button" type="submit">Login</button>
            <a href="register-page.php"><button id="register-button" type="button">New? Create Account</button></a>
        </form>      
    </div>
</body>

<footer></footer>
</html>
