<?php
	require_once("db_connexion.php");
	require_once("xor.php");
	$pseudo= htmlspecialchars($_GET["pseudo"]);
	$firstname= htmlspecialchars($_GET["firstname"]);
	$name= htmlspecialchars($_GET["name"]);
	$password1= htmlspecialchars($_GET["password1"]);
	$password2= htmlspecialchars($_GET["password2"]);

		$bdd = new PDO("mysql:host=localhost;dbname=bdd_terrabay",'root', '');
		$st = $bdd->query("SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' ")->fetch();

		if( $st['COUNT(*)'] == 1 ){
			header("location:../index.php?go=subscribe");
	} else {
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;
		$conn = new PDO("mysql:host=localhost;dbname=bdd_terrabay",'root', '');
    //mysqli_query($db_connexion, "INSERT INTO users (id_user, pseudo, firstname, name, note, password, balance) VALUES (NULL, '".$pseudo."', '".$firstname."', '".$name."', '2.5', '".$password."', '0.0')");
		$sql = "INSERT INTO users (id_user, pseudo, firstname, name, note, password, balance)
		VALUES (NULL, '".$pseudo."', '".$firstname."', '".$name."', '2.5', '".$password."', '0.0')";
    $conn->exec($sql);
		header("location:../index.php?subscribe=confirmed");
	}
?>
