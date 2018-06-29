<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
	require_once("loged_or_not.php");
	require_once("db_connexion.php");
	include("../view/header.php");
	include("../view/account_settings.php");

	// MODIFICATION DE DONNÉES
if (isset($_POST["pseudo"])){
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	include("../model/account_model.php");
	$how_much = $db_connexion->query($req_how_much)->fetch();
	if( $how_much['COUNT(*)'] == 1 ){
		header("location:../controller/account_settings.php?error=pseudo_exist");
	} else {
		$req = $db_connexion->prepare($req_pseudo);
		$req->execute();
		$_SESSION["pseudo"] = $pseudo ;
		header("location:../controller/account_controller.php?done=new_pseudo");
	}
} elseif(isset($_POST["firstname"])){
	$firstname = htmlspecialchars($_POST["firstname"]);
	include("../model/account_model.php");
	$req = $db_connexion->prepare($req_firstname);
	$req->execute();
	header("location:../controller/account_controller.php?done=new_firstname");
}elseif(isset($_POST["email"])){
	$email = htmlspecialchars($_POST["email"]);
	include("../model/account_model.php");
	$req = $db_connexion->prepare($req_name);
	$req->execute();
	header("location:../controller/account_controller.php?done=new_email");
} elseif(isset($_POST["name"])){
	$name = htmlspecialchars($_POST["name"]);
	include("../model/account_model.php");
	$req = $db_connexion->prepare($req_email);
	$req->execute();
	header("location:../controller/account_controller.php?done=new_name");
} elseif(isset ($_POST["password"]) || isset($_POST["password1"]) || isset($_POST["password2"])){
	if(!isset ($_POST["password"]) || !isset($_POST["password1"]) || !isset($_POST["password2"])){
		header("location:../controller/account_settings.php?error=password_not_set");
	} else {
		$password = htmlspecialchars($_POST["password"]);
		$password1 = htmlspecialchars($_POST["password1"]);
		$password2 = htmlspecialchars($_POST["password2"]);
		$xor_key = 'ByTheWay66';
		require_once("xor.php");
		$signal = base64_encode(xorIt($password, $xor_key));
		$password3 = $signal;

		if ( $data["password"] === $password3){
			if($password1 === $password2){
				$xor_key = 'ByTheWay66';
				$signal = base64_encode(xorIt($password1, $xor_key));
				$password = $signal;
				include("../model/account_model.php");
				$req_pass = $db_connexion->prepare($req_password);
				$req_pass->execute();
				header("location:../controller/account_controller.php?done=new_password");
			} else {
				header("location:../controller/account_settings.php?error=bad_password");
			}
		} else {
		header("location:../controller/account_settings.php?error=wrong_password");
		}
	}
}
if ( isset($_POST["account"]) && $_POST["account"] == "delete"){
	include("../model/account_model.php");
	$req = $db_connexion->prepare($req_delete_account);
	$req->execute();
	header("location:disconnect.php");
}



?>
