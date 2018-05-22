<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>TerraBay Account</title>
	</head>
	<body>
		<form action='home.php' method='GET'>
			<button>Back</button></form>
		</form>

		<?php

		require_once("fonctions/db_connexion.php");
		$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
		$data = mysqli_fetch_array($req);

		echo "Pseudo :".$data["pseudo"]."<br>
					Firstname".$data["firstname"]."<br>
					Name :".$data["name"]."<br>
					Note :".$data["note"]."<br>";

		?>

		<form action='account_settings.php' method='GET'>
			<button>Settings</button>
		</form>
	</body>
</html>
