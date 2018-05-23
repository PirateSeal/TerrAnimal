<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
	// LOCALISATION DU PSEUDO DANS LA BASE DE DONNÉE ET STOCKAGE DE SA LIGNE DANS $DATA
	require_once("db_connexion.php");
	$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
	$data = mysqli_fetch_array($req);

	// IDENTIFICATION BDD PDO POUR MODIFICATIOIN
	$mysqli = new mysqli("localhost", "root", "", "bdd_terrabay");

	// MODIFICATION DE DONNÉES
	if (isset($_POST["pseudo"])){
		$pseudo = htmlspecialchars($_POST["pseudo"]);
		$req1 = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$pseudo."'");
		if ( mysqli_num_rows($req1) == 1 ){
			header("location:../account_settings.php?error=pseudo_exist");
		} else {
			$_SESSION["pseudo"] = $pseudo;
			$stmt = $mysqli->prepare("UPDATE users SET pseudo = ? WHERE id_user = ?");
			$stmt->bind_param('sd', $pseudo, $data["id_user"]);
			$stmt->execute();
			header("location:../account.php?done=new_pseudo");
		}
  } elseif(isset($_POST["firstname"])){
		$firstname = htmlspecialchars($_POST["firstname"]);
		$stmt = $mysqli->prepare("UPDATE users SET firstname = ? WHERE id_user = ?");
		$stmt->bind_param('sd', $firstname, $data["id_user"]);
		$stmt->execute();
		header("location:../account.php?done=new_firstname");
  } elseif(isset ($_POST["name"])){
		$name = htmlspecialchars($_POST["name"]);
		$stmt = $mysqli->prepare("UPDATE users SET name = ? WHERE id_user = ?");
		$stmt->bind_param('sd', $name, $data["id_user"]);
		$stmt->execute();
		header("location:../account.php?done=new_name");
  } elseif(isset ($_POST["password"]) || isset($_POST["password1"]) || isset($_POST["password2"])){
		if(!isset ($_POST["password"]) || !isset($_POST["password1"]) || !isset($_POST["password2"])){
			header("location:../account_settings.php?error=password_not_set");
		} else {
			$password = htmlspecialchars($_POST["password"]);
			$password1 = htmlspecialchars($_POST["password1"]);
			$password2 = htmlspecialchars($_POST["password2"]);
			if ( $data["password"] === $password){
				if($password1 === $password2){
					$stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE id_user = ?");
					$stmt->bind_param('sd', $password2, $data["id_user"]);
					$stmt->execute();
					header("location:../account.php?done=new_password");
				} else {
					header("location:../account_settings.php?error=bad_password");
				}
			} else {
				header("location:../account_settings.php?error=wrong_password");
			}
		}
  }



?>
