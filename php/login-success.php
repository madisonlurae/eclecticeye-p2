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

	<h1>Login Successful!</h1><br>

	<p>Hello!</p>
	<?php echo session_id();?>

	<p>Redirecting to our home page, just a moment...</p>

	<?php 
		header("refresh:3;url=../index.html");
	?>
</body>
</html>