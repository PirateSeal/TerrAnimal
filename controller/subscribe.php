<?php
	require_once("db_connexion.php");
	require_once("xor.php");

	$pseudo= htmlspecialchars($_GET["pseudo"]);
	$firstname= htmlspecialchars($_GET["firstname"]);
	$email = htmlspecialchars($_GET["email"]);
	$name= htmlspecialchars($_GET["name"]);
	$password1= htmlspecialchars($_GET["password1"]);
	$password2= htmlspecialchars($_GET["password2"]);



		require("../model/subscribe_model.php");

	$how_much = $db_connexion->query($req_subscribe)->fetch();
	if( $how_much['COUNT(*)'] == 1 ){
		header("location:../controller/index_controller.php?user=exist");
	} else {
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;
		require("../model/subscribe_model.php");
		$db_connexion->exec($sql);
		header("location:../index.php?subscribe=confirmed");
	}
?>
