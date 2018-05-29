<?php
	require_once("db_connexion.php");
	require_once("xor.php");
	$pseudo= htmlspecialchars($_GET["pseudo"]);
	$firstname= htmlspecialchars($_GET["firstname"]);
	$email = htmlspecialchars($_GET["email"]);
	$name= htmlspecialchars($_GET["name"]);
	$password1= htmlspecialchars($_GET["password1"]);
	$password2= htmlspecialchars($_GET["password2"]);

		/*$user = [$pseudo,$firstname,$name,$email,$password1,$password2];
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
		 }*/
		 
	if( $how_much['COUNT(*)'] == 1 ){
		header("location:../index.php?go=subscribe");
	} else {
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;

		$db_connexion->exec($sql);
		header("location:../index.php?subscribe=confirmed");
	}
?>
