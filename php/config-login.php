<?php 

session_start(); 

//first connect to the data base
include "connect-db.php";

//validate data entered in the login form
if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    //create variables for username and password
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    //make sure fields aren't left empty
    if (empty($username)) {
        header("Location: login-page.php?error=Please enter a username");
        exit();
    } else if (empty($password)){
        header("Location: login-page.php?error=Please enter a password");
        exit();
    //if fields aren't empty, continue
    } else {
        $sql = "SELECT * FROM information WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        //only one row should return
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            //insure info is correct
            if ($row['username'] === $username && $row['password'] === $password) {
                echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                header("Location: ../index.html");
                exit();
            //if info doesn't match, incorrect or nonexistant user/pass
            } else {
                header("Location: login-page.php?error=Incorect User name or password");
                exit();
            }
        //if no rows return, incorrect or nonexistant user/pass
        } else {
            header("Location: login-page.php?error=Incorect User name or password");
            exit();
        }
    }
} else {
    header("Location: login-page.php");
    exit();
}
