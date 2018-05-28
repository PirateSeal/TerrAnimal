<?php
	require_once("loged_or_not.php");
	require_once("db_connexion.php");
	require_once("xor.php");
	$data = $db_connexion->query("SELECT * FROM users WHERE pseudo='".$_SESSION["pseudo"]."'")->fetch();

	// MODIFICATION DE DONNÉES
if (isset($_POST["pseudo"])){
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$how_much = $db_connexion->query("SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' ")->fetch();
	if( $how_much['COUNT(*)'] == 1 ){
		header("location:../view/account_settings.php?error=pseudo_exist");
	} else {
		$req = $db_connexion->prepare("UPDATE users SET pseudo = '".$pseudo."' WHERE id_user = '".$data['id_user']."'");
		$req->execute();
		$_SESSION["pseudo"] = $pseudo ;
		header("location:../view/account.php?done=new_pseudo");
	}
} elseif(isset($_POST["firstname"])){
	$firstname = htmlspecialchars($_POST["firstname"]);
	$req = $db_connexion->prepare("UPDATE users SET firstname = '".$firstname."' WHERE id_user = '".$data['id_user']."'");
	$req->execute();
	header("location:../view/account.php?done=new_firstname");
}elseif(isset($_POST["email"])){
	$email = htmlspecialchars($_POST["email"]);
	$req = $db_connexion->prepare("UPDATE users SET email = '".$email."' WHERE id_user = '".$data['id_user']."'");
	$req->execute();
	header("location:../view/account.php?done=new_email");
} elseif(isset($_POST["name"])){
	$name = htmlspecialchars($_POST["name"]);
	$req = $db_connexion->prepare("UPDATE users SET name = '".$name."' WHERE id_user = '".$data['id_user']."'");
	$req->execute();
	header("location:../view/account.php?done=new_name");
} elseif(isset ($_POST["password"]) || isset($_POST["password1"]) || isset($_POST["password2"])){
	if(!isset ($_POST["password"]) || !isset($_POST["password1"]) || !isset($_POST["password2"])){
		header("location:../view/account_settings.php?error=password_not_set");
	} else {
		$password = htmlspecialchars($_POST["password"]);
		$password1 = htmlspecialchars($_POST["password1"]);
		$password2 = htmlspecialchars($_POST["password2"]);
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password, $xor_key));
		$password3 = $signal;

		if ( $data["password"] === $password3){
			if($password1 === $password2){
				$xor_key = 'ByTheWay66';
				$signal = base64_encode(xorIt($password1, $xor_key));
				$password = $signal;
				$req = $db_connexion->prepare("UPDATE users SET password = '".$password."' WHERE id_user = '".$data['id_user']."'");
				$req->execute();
				header("location:../view/account.php?done=new_password");
			} else {
				header("location:../view/account_settings.php?error=bad_password");
			}
		} else {
		header("location:../view/account_settings.php?error=wrong_password");
		}
	}
}
if ( isset($_POST["account"]) && $_POST["account"] == "delete"){
	$req = $db_connexion->prepare("DELETE FROM users WHERE id_user = '".$data['id_user']."'");
	$req->execute();
	header("location:disconnect.php");
}



?>
