<!DOCTYPE html>
<html>
	<head>
		<script src="view/css/bootstrap/bootstrap1.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>
    <script src="view/css/bootstrap/bootstrap2.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"></script>
    <script src="view/css/bootstrap/bootstrap3.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" ></script>
    <link rel="stylesheet" href="view/css/bootstrap/bootstrap.css" >
		<link rel='stylesheet' type='text/css' href='view/css/style.css'>
		<title>TerraBay</title>
	</head>
	<body>
		<?php if (isset($_GET["subscribe"]) && $_GET["subscribe"] == "confirmed"){ echo "<script>alert('Your account has been created !')</script>";} ?>
		<center><h1> Welcome on TerraBay</h1></center>
		<br><br>
		<div id="box">
			<br>
			<h3>Please login or register to access the services.</h3>
			<form action="controller/index_controller.php" method="POST">
				<button class="button button1" name="go" value="login">Login</button>
			</form>
			<form action="controller/index_controller.php" method="POST">
				<button class="button button2" name="go" value="subscribe">Subscribe</button>
			</form>
			<br><br>
		</div>
		<?php
			if ( isset($_GET["user"])){if ( $_GET["user"] === "exist"){echo "<h6> Your pseudo already exist ! </h6>";}}
		?>
	</body>
</html>
