<?php 

session_start();

    include("connect-db.php");

    //must be logged in to order 
    if (!isset($_SESSION['user'])) {
        header("Location: login-page.php?loginmsg=failed");
    }

    $userFK = $_SESSION['user'];

    //make sure something was posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //variables for the provided user, pass, first name, and last name
        $collection = $_POST['collection'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $scent = $_POST['scent'];
        $crystal = $_POST['crystal'];

        //make sure fields were not empty
        //if (!empty($collection) && !empty($size) && !empty($color) && !empty($scent) && !empty($crystal)) {
             //save to database
             //order_id auto increments, insert as default
             $query = "INSERT INTO `orders` VALUES (DEFAULT, '$userFK', '$collection', '$size', '$color', '$scent', '$crystal')";
             mysqli_query($con, $query);
             //bring to account page on success
             header("Location: ../account.html");
             die;
        //} else { //something was left blank
		    header("Location: purchaseform.php?fieldsmsg=failed");
	    //}
    } 

?>

<!DOCTYPE html>
<html>

<head>
    <title>Eclectic Eye</title>
    <link rel="stylesheet" href="/css/sharedstyle.css">
    <link rel="stylesheet" href="/css/purchaseformstyle.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="/imgs/eclectic-eye-logo-icon.jpg"/>
    <script src="../js/javascript.js"></script>
</head>

<header>
    <div id="menu">
        <div id="menu-bar-logo"><img id="menu-bar-logo" src="/imgs/eclectic-eye-logo-text.jpg" alt="eclectic eye logo"></div>
        <div id="nav-bar">
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="/index.html">Home</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="/about.html">About</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="/contact.html">Contact</a>
            <a class="nav-link" onmouseover="fadeout(this);" onmouseleave="fadein(this);" href="/gallery.html">Gallery</a>
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
        <h1>Custom Candle Form</h1>
         <!--this will echo the fields are empty error msg-->
         <?php
                if (isset($_GET["fieldsmsg"]) && $_GET["fieldsmsg"] == 'failed') {
                    echo "Please fill all fields";
                }
            ?><br><br>
        <form class="order-form">
            <!--Choose a candle from pre set collections-->
            <h2 id="needs-top-padding">Please select from one of our collections to act as a base for your candle!</h2>
            
            <div class="form-group">
                <p><label>Zodiac Collection</label></p>
                <input type="radio" name="collection" value="Aries">Aries</input>
                <input type="radio" name="collection" value="Aquarius">Aquarius</input>
                <input type="radio" name="collection" value="Cancer">Cancer</input>
                <input type="radio" name="collection" value="Capricorn">Capricorn</input>
                <input type="radio" name="collection" value="Gemini">Gemini</input>
                <input type="radio" name="collection" value="Leo">Leo</input>
                <input type="radio" name="collection" value="Libra">Libra</input>
                <input type="radio" name="collection" value="Pisces">Pisces</input>
                <input type="radio" name="collection" value="Sagittarius">Sagittarius</input>
                <input type="radio" name="collection" value="Scorpio">Scorpio</input>
                <input type="radio" name="collection" value="Taurus">Taurus</input>
                <input type="radio" name="collection" value="Virgo">Virgo</input>
            </div>

            <div class="form-group">
                <p><label>Emotions Collection</label></p>
                <input type="radio" name="collection" value="Sweet Dreams">Sweet Dreams</input>
                <input type="radio" name="collection" value="Tranquility">Tranquility</input>
            </div>

            <p id="needs-top-padding">For all other options below, select 'Base' to keep the default quality of your base candle.</p>


            <!--Pick size, color, scent, and crystals-->
            <div class="form-group">
                <h2>What size candle would you like?</h2>
                <p>Note that price may need to be raised if specifications are intensive. I will contact you if this is the case.</p>
                <input type="radio" name="size" value="Tealight">Tealight ($5)</input>
                <input type="radio" name="size" value="Small">Small ($10)</input>
                <input type="radio" name="size" value="Medium">Medium ($15)</input>
                <input type="radio" name="size" value="Large">Large ($20)</input>
                <input type="radio" name="size" value="X-Large">Extra Large ($25)</input>
            </div>

            <div class="form-group">
                <h2><label for="color">What color would you like?</label></h2>
                <select name="color">
                    <option value="Base">Base</option>
                    <option value="Red">Red</option>
                    <option value="Orange">Orange</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                    <option value="Purple">Purple</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                </select>

            </div>
            <div class="form-group">
                <h2><label for="scent">What scent would you like?</label></h2>
                <select name="scent">
                    <option value="Base">Base</option>
                    <option value="Citrus">Citrus</option>
                    <option value="Eygptian Musk">Eygptian Musk</option>
                    <option value="Floral">Floral</option>
                    <option value="Lavander">Lavander</option>
                    <option value="Ocean breeze">Ocean Breeze</option>
                    <option value="Pine">Pine</option>
                </select>
            </div>

            <div class="form-group">
                <h2><label for="crytal">What type of crystal would you like?</label></h2>
                <select name="crystal">
                    <option value="Base">Base</option>
                    <option value="Amethyst">Amethyst</option>
                    <option value="Citrine">Citrine</option>
                    <option value="Clear Quartz">Clear Quartz</option>
                    <option value="Iolite">Iolite</option>
                    <option value="Jade">Jade</option>
                    <option value="Onyx">Onyx</option>
                    <option value="Rose Quartz">Rose Quartz</option>                    
                    <option value="Iiger's Eye">Tiger's Eye</option>
                </select>
            </div>

            <p>Thank you for your interest!</p>

            <button type="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

<footer></footer>
</html>