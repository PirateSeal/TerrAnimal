<?php
	// CHARGEMENT DE LA FONCTION DE CONNEXION AVEC LA BASE DE DONNÉE .
	require_once("db_connexion.php");
	require_once("xor.php");
	// MISE EN VARIABLE LES STRINGS ENTRÉE DANS LES CHAMPS DE L'INDEX.
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$password1 = htmlspecialchars($_POST["password"]);

	// RECHERCHE DANS LA BASE DE DONNÉE DE L'USERNAME.
	$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$pseudo."'");

	// SI LE NOMBRE DE LIGNE AVEC SE PSEUDO = 1 .
	if ( mysqli_num_rows($req) == 1){
		// FETCH = ALLER A LA RECHERCHE DE REQ .
		$data = mysqli_fetch_array($req);

		// SI LE PASSWORD DE LA BASE DE DONNÉE EST ÉGALE AU PASSWORD ENTRÉE
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;
		echo $password1;
		echo $password;
		if($data["password"] == $password ){
				// MEMORISATION DES LOGINS DE LA SESSION .
				session_start();
				$_SESSION["id"] = $data["id"];
				$_SESSION["pseudo"] = $pseudo;
				header("location:../home.php");
		} else {
			echo "Mot de passe incorrect !";
		}
	} else {
		echo "Ce compte n'éxiste pas !";
	}
?>
