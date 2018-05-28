<?php
	// CHARGEMENT DE LA FONCTION DE CONNEXION AVEC LA BASE DE DONNÉE .
	require_once("db_connexion.php");
	require_once("xor.php");
	// MISE EN VARIABLE LES STRINGS ENTRÉE DANS LES CHAMPS DE L'INDEX.
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$password1 = htmlspecialchars($_POST["password"]);

		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;

		try {$bdd = new PDO('mysql:host=localhost;dbname=bdd_terrabay', 'root', '');}
		catch (Exception $e) {
			die("L'accès à la base de donnée est impossible.");
		}

	$st = $bdd->query("SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' AND password='".$password."'")->fetch();

	if( $st['COUNT(*)'] == 1 ){
				session_start();
				$_SESSION["pseudo"] = $pseudo;
				header("location:../controller/home_controller.php");
	} else {
		echo "Ce compte n'éxiste pas !";
	}
?>
