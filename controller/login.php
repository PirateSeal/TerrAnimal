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
	$status = $db_connexion->query($req_status)->fetch(PDO::FETCH_ASSOC);

	if( $how_much['COUNT(*)'] == 1 ){
				session_start();
				$_SESSION["pseudo"] = $pseudo;
				$_SESSION["ID"] = $status['id_user'];
				if ($status['status'] == 'admin') {
					$_SESSION['admin'] = true;
					header("location:../controller/backoffice_controller.php");
				} else {
					header("location:../controller/home_controller.php");
				}
	} else {
		header("location:../controller/index_controller.php?error=wrong");
	}
?>
