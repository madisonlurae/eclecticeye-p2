<?php 

session_start();

include("connect-db.php");

$name = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Eclectic Eye</title>
</head>
<body>

	<h1>Login Successful!</h1><br>

	<p>Hello, <?php echo $name;?>!</p>
	
	<p>Redirecting to our home page, just a moment...</p>

	<?php 
		header("refresh:3;url=../index.html");
	?>
</body>
</html>