<?php
	// CHARGEMENT DE LA FONCTION DE CONNEXION AVEC LA BASE DE DONNÉE .
	require_once("db_connexion.php");

	// MISE EN VARIABLE LES STRINGS ENTRÉE DANS LES CHAMPS DE L'INDEX.
	$pseudo = htmlspecialchars($_POST["pseudo"]);
	$password = htmlspecialchars($_POST["password"]);

	// RECHERCHE DANS LA BASE DE DONNÉE DE L'USERNAME.
	$req = mysqli_query($bdd_connexion, "SELECT * FROM user WHERE pseudo = '".$pseudo."'");

	// SI LE NOMBRE DE LIGNE AVEC SE PSEUDO = 1 .
	if ( mysqli_num_rows($req) == 1){
		// FETCH = ALLER A LA RECHERCHE DE REQ .
		$data = mysqli_fetch_array($req);

		// SI LE PASSWORD DE LA BASE DE DONNÉE EST ÉGALE AU PASSWORD ENTRÉE
		if($data["password"] == $password ){
				// MEMORISATION DES LOGINS DE LA SESSION .
				session_start();
				$_SESSION["id"] = $data["id"];
				$_SESSION["username"] = $data["username"];
				header("location:../home.php");
		} else {
			echo $username;
			echo $password;
			echo "Mot de passe incorrect !";
		}
	} else {
		echo "Ce compte n'éxiste pas !";
	}
?>
