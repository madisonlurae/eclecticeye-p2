<?php 

session_start();

    include("connect-db.php");

    ini_set('display_errors', 1);

    //make sure form was posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //variables for the provided user and pass
        echo "posted";
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        //make sure fields were not empty
        if (!empty($user_name) && !empty($password)) {
            //get user from database that matches username
            $query = "select * from eclectic_eye_login where username = '$user_name' limit 1";
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
                        echo "Invalid password";
                    }
                }
            }
            //reaches here if username is not found
            echo "Invalid username";
        //reaches here if fields were empty
        } else {
            echo "Please fill all fields";
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
            <h2>Login</h2>
            <label>Username</label>
            <input type="text" name="user_name" placeholder="Username"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br> 
            <button id="login-button" type="submit">Login</button>
            
        </form>      
    </div>
</body>

<footer></footer>
</html>
