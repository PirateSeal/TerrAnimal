<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='view/style.css'>
		<title>TerraBay </title>
	</head>
	<body>
		<?php if (isset($_GET["subscribe"]) && $_GET["subscribe"] == "confirmed"){ echo "<script>alert('Your account has been created !')</script>";} ?>
		<center><h1> Welcome on TerraBay</h1></center>
		<form action="controller/index_controller.php" method="POST">
			<button name="go" value="login">Login</button>
		</form>
		<form action="controller/index_controller.php" method="POST">
			<button name="go" value="subscribe">Subscribe</button>
		</form>
		<?php
			if ( isset($_GET["user"])){
				if ( $_GET["user"] === "exist"){
					echo "<h6> Your pseudo already exist ! </h6>";
				}
			}
		?>
	</body>
</html>
