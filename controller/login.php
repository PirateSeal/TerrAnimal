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

		require("../model/login_model.php");
	$how_much = $db_connexion->query($req_login)->fetch();

	if( $how_much['COUNT(*)'] == 1 ){
		session_start();
		$_SESSION["pseudo"] = $pseudo;
		require("../model/login_model.php");
		$data = $db_connexion->query($req_data)->fetch();
		echo $data["status"];
		if ($data["status"] === "admin"){
			header("location:../controller/bo_controller.php");
		} else {
			header("location:../controller/home_controller.php");
		}
	} else {
		header("location:../view/login.php?error=wrong");
	}
?>
