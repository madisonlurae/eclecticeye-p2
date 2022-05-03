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
            <a class="nav-link" href="/index.html">Home</a>
            <a class="nav-link" href="/about.html">About</a>
            <a class="nav-link" href="/contact.html">Contact</a>
            <a class="nav-link" href="/gallery.html">Gallery</a>
            <a class="nav-link" href="/purchaseform.html">Custom Candle Form</a>
        </div>
    </div>
    <div id="menu-slide">
        <button class="hide-button" onclick="slideUpClass('nav-link'), slideUpID('menu');">Collapse</button>
        <button class="hide-button" onclick="slideDownClass('nav-link'), slideDownID('menu');">Expand</button>
    </div>
</header>

<body>
    <div class="flex-parent">
        <form action="config-login.php" method="post">
            <h2>Login</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <label>Username</label>
            <input type="text" name="username" placeholder="Username"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br> 
            <button id="login-button" type="submit">Login</button>
        </form>
        <form action="/php/create-account.php" method="post">
            <h2>New? Register</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name"><br>
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
