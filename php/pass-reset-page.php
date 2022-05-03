<?php 

session_start();

    include("connect-db.php");

    //get username
    $name = $_SESSION['user'];

    //make sure form was posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //variables for the provided user and pass
        echo "posted";
        $new = $_POST['pass_new'];

        //make sure fields were not empty
        if (!empty($new)) {
             //check password against regex
            if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $new)) {
                header("Location: pass-reset-page.php?regmsg=failed");
            } else {
                //save to database
                $query = "update user set password='$pass' where username='$name'";
                mysqli_query($con, $query);
                //bring to account page on success
                header("Location: ../account.html");
                die;
            }
        //reaches here if fields were empty
        } else {
            header("Location: pass-reset-page.php?fieldmsg=failed");
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
            <h2>Change Password</h2>

            <!--this will echo the fields are empty error msg-->
            <?php
                if (isset($_GET["fieldmsg"]) && $_GET["fieldmsg"] == 'failed') {
                    echo "Please fill all fields";
                }
            ?><br><br>

            <label>New Password</label>
            <input type="password" name="pass_new" placeholder="Password"><br> 
            <!--this will echo the regex error msg-->
            <?php
                if (isset($_GET["regmsg"]) && $_GET["regmsg"] == 'failed') {
                    echo "at least one lowercase char"; break;
                    echo "at least one uppercase char"; break;
                    echo "at least one digit"; break;
                    echo "at least one special sign of @#-_$%^&+=§!?"; break;
                }
            ?><br><br>
            <button id="login-button" type="submit">Change</button>
        </form>      
    </div>
</body>

<footer></footer>
</html>
