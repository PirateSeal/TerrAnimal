<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
	require_once("db_connexion.php");


	$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
	$data = mysqli_fetch_array($req);

	$mysqli = new mysqli("localhost", "root", "", "bdd_terrabay");

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
			header("location:../account.php");
		}
  } elseif(isset ($_POST["firstname"])){
    echo "blyat1";
  } elseif(isset ($_POST["name"])){
    echo "blyat2";
  } elseif(isset ($_POST["password"])){
    echo "blyat3";
  }



?>
