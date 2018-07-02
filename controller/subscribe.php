<?php
	require_once("db_connexion.php");
	require_once("xor.php");

	$req_insert_user = $db_connexion->prepare("INSERT INTO users (id_user, pseudo, email, firstname, name, note, password)VALUES (NULL, :pseudo,:email,:firstname, :name, '2.5', :password)");
    $req_insert_user->bindParam(':pseudo',$pseudo);
    $req_insert_user->bindParam(':email',$email);
    $req_insert_user->bindParam(':firstname',$firstname);
    $req_insert_user->bindParam(':name',$name);
    $req_insert_user->bindParam(':password',$password);

	$pseudo= htmlspecialchars($_GET["pseudo"]);
	$firstname= htmlspecialchars($_GET["firstname"]);
	$email = htmlspecialchars($_GET["email"]);
	$name= htmlspecialchars($_GET["name"]);
	$password1= htmlspecialchars($_GET["password1"]);
	$password2= htmlspecialchars($_GET["password2"]);

	$quote = [$firstname,$name];
	    for ($i=0; $i < 2 ; $i++) {
				addslashes($quote[$i]);
					for ($j=0; $j < strlen($quote[$i]) ; $j++) {
	          if ($quote[$i][$j] === "'"){
	            $dual[$i] = explode("'", $quote[$i]);
	            $fin[$i] = implode("\\'",$dual[$i]);
	          } else {
							$fin[$i] = $quote[$i];
						}
	        }
	    }
	    $firstname = $fin[0];
	    $name = $fin[1];
			echo $firstname ;
			echo "<br>";
			echo $name;

		require("../model/subscribe_model.php");

	$how_much = $db_connexion->query($req_subscribe)->fetch();
	if( $how_much['COUNT(*)'] == 1 ){
		header("location:../controller/index_controller.php?user=exist");
	} else {
		$xor_key = 'ByTheWay66';
		$signal = base64_encode(xorIt($password1, $xor_key));
		$password = $signal;
		//require("../model/subscribe_model.php");
		//$db_connexion->exec($sql);
		$req_insert_user->execute();
		header("location:../index.php?subscribe=confirmed");
	}
?>
