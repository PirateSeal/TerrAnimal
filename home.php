<?php
	SESSION_start();
	include("logged_or_not.php");
	$welcome = "Bienvenue ".$_SESSION["pseudo"]." !!";
	echo "<!DOCTYPE html>
			<html>
				<head>
					<link rel='stylesheet' type='text/css' href='style.css' />
					<title>TerraBay</title>
				</head>
				<body>
					".$welcome."
					<h1>Tu es bien connecté !!</h1>
					<form action='fonctions/logedornot.php' method='get'>
						<button>ok</button>
					</form>
					<form action='fonctions/deconnect.php' method='get'>
						<button>Deconnect</button>
					</form>
				</body>
		</html>";
?>
