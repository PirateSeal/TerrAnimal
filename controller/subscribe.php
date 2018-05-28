<?php
	require_once("db_connexion.php");
	require_once("xor.php");
	$pseudo= htmlspecialchars($_GET["pseudo"]);
	$firstname= htmlspecialchars($_GET["firstname"]);
	$email = htmlspecialchars($_GET["email"]);
	$name= htmlspecialchars($_GET["name"]);
	$password1= htmlspecialchars($_GET["password1"]);
	$password2= htmlspecialchars($_GET["password2"]);


		$how_much = $db_connexion->query("SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' ")->fetch();

		$user = [$pseudo,$firstname,$name,$email,$password1,$password2];
		$interdit = ['"',"&","'","{","(","[","-","|","`","_","'\'"];
		$flag = 0;
		for ($i=0; $i < count($user) ; $i++) {
			for ($j=0; $j < strlen($user[$i]) ; $j++) {
				for ($k=0; $k < count($interdit); $k++) {
					if ( $user[$i][$j] === $interdit[$k]){
						$flag = 1 ;
					}
				}
			}
		}
		 if ( $flag === 1 ){
			 header("location:../index.php?go=subscribe");
		 }
		if( $how_much['COUNT(*)'] == 1 ){
			header("location:../index.php?go=subscribe");
	} else {
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;

		$sql = "INSERT INTO users (id_user, pseudo, email, firstname, name, note, password, balance)
		VALUES (NULL, '".$pseudo."','".$email."','".$firstname."', '".$name."', '2.5', '".$password."', '0.0')";
		$db_connexion->exec($sql);
		header("location:../index.php?subscribe=confirmed");
	}
?>
