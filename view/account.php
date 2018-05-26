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
			// AFFICHAGE DES INFORMATIONS ACTUELLES DE L'UTILISATEUR .
			require_once("fonctions/db_connexion.php");
			$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
			$data = mysqli_fetch_array($req);
			echo "Pseudo :".$data["pseudo"]."<br>
						Firstname :".$data["firstname"]."<br>
						Name :".$data["name"]."<br>
						Note :".$data["note"]."<br>";
		?>

		<form action='account_settings.php' method='GET'>
			<button>Settings</button>
		</form>

		<?php
			// COMMENTAIRE DE MODIFICATION
			if (isset ( $_GET["done"])){
				if ( $_GET["done"] == "new_pseudo"){
					echo"<h6>Your pseudo has been changed .</h6>";
				} elseif ( $_GET["done"] == "new_firstname"){
					echo"<h6>Your firstname has been changed .</h6>";
				} elseif ( $_GET["done"] == "new_name"){
					echo"<h6>Your name has been changed .</h6>";
				} elseif ( $_GET["done"] == "new_password"){
					echo"<h6>Your password has been changed .</h6>";
				}
			}
		?>

	</body>
</html>