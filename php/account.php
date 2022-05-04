<?php
    
session_start();

include("connect-db.php");
//fetch con from connect-db to function can access it
$con;

    $tableName="orders";
    $columns= ['order_id', 'user_id','base', 'size','color','scent','crystals'];

    $tableData = fetch_data($con, $tableName, $columns);

    function fetch_data($con, $tableName, $columns) {
        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY order_id DESC";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
        } else {
            $msg= "No Data Found"; 
        }
        return $msg;
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
        <a href="php/pass-reset-page.php"><button id="register-button">Change Password</button></a>
        <a href="php/config-logout.php"><button id="register-button">Logout</button></a>
        <div id="orders-display">
            <h1>My Orders</h1>
            <!--gather orders data-->
            <?php
                $query = "SELECT 'base', 'size','color','scent','crystals' FROM 'orders'";
                $result = mysqli_query($con, $query);
            ?>
            <!--create table headers-->
            <table cellspacing="0" cellpadding="10">
            <tr>
                <th>Base</th>
                <th>Size</th>
                <th>Color</th>
                <th>Scent</th>
                <th>Crystals</th>
            </tr>
            <!--while there is data to fetch, fill the table-->
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while($data = mysqli_fetch_assoc($result)) { ?>
                    <!--fill table-->
                    <tr>
                        <td><?php echo $data['base']; ?> </td>
                        <td><?php echo $data['size']; ?> </td>
                        <td><?php echo $data['color']; ?> </td>
                        <td><?php echo $data['scent']; ?> </td>
                        <td><?php echo $data['crystals']; ?> </td>
                     <tr>
                    
                    <?php }} else { ?>
                        <!--if data is not found-->
                        <tr>
                        <td colspan="8">No data found</td>
                        </tr>
                    <?php } ?> <!--close else-->
            </table>
        </div>
    </div>
</body>


<footer></footer>
</html>