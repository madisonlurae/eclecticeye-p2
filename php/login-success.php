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

	Hello, <?php print $user_data['username']; ?>!

	<p>Redirecting to our home page, just a moment...</p>

	<?php 
		header("refresh:5;url=../index.html");
	?>
</body>
</html>