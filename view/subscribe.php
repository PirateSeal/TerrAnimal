<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>TerraBay</title>
	</head>
	<body>
	<form action="index.php" method="POST">
		<button>Back</button>
	</form>
	<h2>Subscribe Field</h2>
	<form action="fonctions/subscribe.php" method="POST">
		<label for="pseudo">Your pseudo :</label><input type="text" size="25" name="pseudo" value=""><br>
		<label for="firstname">Firstname :</label><input type="text" size="25" name="firstname" value=""><br>
		<label for="name">Name :</label><input type="text" size="25" name="name" value=""><br>
		<label for="password1">Password :</label><input type="password" size="25" name="password1" value=""><br>
		<label for="password2">Re-enter password :</label><input type="password" size="25" name="password2" value=""><br>
		<label for="email">Email :</label><input type="text" size="25"name="email" value=""><br>
		<?php
			if (isset($_GET["error"])){
				if ($_GET["error"] == "incomplete"){
					echo "<h4>Please complete all fields .</h4>";
				} else if ($_GET["error"] == "tooshort"){
					echo "<h4>Your username and password must contain at least 3 characters .</h4>";
				} else if ($_GET["error"] == "exist"){// a revoir O_o
					echo "<h4>This username already exists .</h4>";
				} else if ($_GET["error"] == "password"){
					echo "<h4>The passwords do not match .</h4>";
				}
			} elseif (isset($_GET["subscribe"]) && $_GET["subscribe"] == "confirmed"){
				echo "Your registration has been registered .<br>You will be redirected in 3 seconds<br>";
						header("Refresh:3;Url=index.php");
			}
		?>
		<button>Submit</button>
	</form>
	</body>
</html>
