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

	<h1>Logout Successful!</h1>

	<p>Until next time!</p>

	<p>Redirecting to our home page, just a moment...</p>

	<?php 
		header("refresh:3;url=../index.html");
	?>
</body>
</html>