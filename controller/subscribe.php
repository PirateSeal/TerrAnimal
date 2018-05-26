<?php
	require_once("db_connexion.php");
	require_once("xor.php");
	$pseudo= htmlspecialchars($_GET["pseudo"]);
	$firstname= htmlspecialchars($_GET["firstname"]);
	$name= htmlspecialchars($_GET["name"]);
	$password1= htmlspecialchars($_GET["password1"]);
	$password2= htmlspecialchars($_GET["password2"]);

	$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$pseudo."'");
	if ( empty ( $pseudo ) || empty ( $firstname ) || empty ( $name )|| empty ($password1) || empty($password2) ){
		//header("location:../view/subscribe.php?error=incomplete");
	} else if ( strlen($password1) < 3 ||  strlen($pseudo) < 3 ) {
		header("location:../view/subscribe.php?error=tooshort");
	} else if ( $password1 != $password2 ){
		header("location:../view/subscribe.php?error=password");
	} else if ( mysqli_num_rows($req) == 1 ){
		header("location:../view/subscribe.php?error=exist");
	} else {
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;
    mysqli_query($db_connexion, "INSERT INTO users (id_user, pseudo, firstname, name, note, password, balance) VALUES (NULL, '".$pseudo."', '".$firstname."', '".$name."', '2.5', '".$password."', '0.0')");
		header("location:../view/subscribe.php?subscribe=confirmed");
	}
?>
