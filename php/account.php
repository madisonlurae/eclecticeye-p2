
<!DOCTYPE html>
<html>

<head>
    <title>Eclectic Eye</title>
    <link rel="stylesheet" href="../css/sharedstyle.css">
    <link rel="stylesheet" href="../css/accountstyle.css">
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
        <div id="button-box">
            <a href="pass-reset-page.php"><button id="register-button">Change Password</button></a>
            <a href="config-logout.php"><button id="register-button">Logout</button></a>
        </div>
        <h1>My Orders</h1>
            <!--gather orders data-->
            <?php
                session_start();
                $name = $_SESSION['user'];

                include("connect-db.php");
                $query = "SELECT order_id, base, size, color, scent, crystals FROM orders WHERE user_id = '$name'";
                $result = mysqli_query($con, $query);
            ?>
            <!--make the table-->
            <table>
                <tr>
                    <th>Order No</th>
                    <th>Base</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Scent</th>
                    <th>Crystals</th>
                </tr>
                <!--get data from rows-->
                <?php //loop until run out of rows
                    while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <!--get data from each row and column-->
                    <td><?php echo $rows['order_id'];?></td>
                    <td><?php echo $rows['base'];?></td>
                    <td><?php echo $rows['size'];?></td>
                    <td><?php echo $rows['color'];?></td>
                    <td><?php echo $rows['scent'];?></td>
                    <td><?php echo $rows['crystals'];?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
    </div>
</body>


<footer></footer>
</html>
