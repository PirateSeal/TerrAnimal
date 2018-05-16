<?php
	require_once("db_connexion.php");
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$password = htmlspecialchars($_POST["password"]);

	$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$pseudo."'");
	if ( mysqli_num_rows($req) == 1){
		$data = mysqli_fetch_array($req);
		if($data["password"] === $password ){
				session_start();
				$_SESSION["id"] = $data["id"];
				$_SESSION["pseudo"] = $data["pseudo"];
		} else {
			header("location:../login.php?error=incorrect");
		}
		if ( isset ( $_SESSION["pseudo"] )){
			header("location:../home.php");
		}
	} else {
		header("location:../login.php?error=incorrect");
	}
?>
