<?php 

session_start();

include("connect-db.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eclectic Eye</title>
</head>
<body>

	<h1>Login Successful!</h1>

	<p>Hello, <?php echo $user_data['username']; ?>!</p>

	<p>Redirecting to our home page, just a moment...</p>

	<?php 
	
	header("Refresh: 10, Location: ../index.html"); ?>
</body>
</html>