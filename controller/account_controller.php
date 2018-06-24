<?php
	require_once("../controller/loged_or_not.php");
	include("../view/header.php");
	include("../view/account.php");
  // AFFICHAGE DES INFORMATIONS ACTUELLES DE L'UTILISATEUR .
	echo "<center><h2>Your account informations</h2></center>
				<div id='box1'><br>";
	require_once("../controller/db_connexion.php");
  	$data = $db_connexion->query("SELECT * FROM users WHERE pseudo='".$_SESSION["pseudo"]."'")->fetch();
  	echo "Pseudo :".$data["pseudo"]."<br>
        	Email :".$data["email"]."<br>";

	$firstname = $data["firstname"];
	$name = $data["name"];
	$quote = [$firstname , $name];

	for ($a=0; $a < count($quote) ; $a++) {
	  if (stripos($quote[$a], 'quote') !== FALSE) {
			for ($i=0; $i < strlen($quote[$a]); $i++) {
	  		if ( $quote[$a][$i] === "q" && $quote[$a][$i+1] == "u" && $quote[$a][$i+2] == "o" && $quote[$a][$i+3] == "t" && $quote[$a][$i+4] == "e"){
					$quote[$a] = substr_replace($quote[$a], "'", $i, 5);
	    	}
	  	}
	 	}
	}

	$firstname = $quote[0];
	$name = $quote[1];

	echo "Firstname :".$firstname."<br>
	Name :".$name."<br>
	Note :".$data["note"]."<br>";

	echo '<a href="../controller/controller_orders.php"><button class="button1" >View my orders</button></a>';

	// COMMENTAIRE DE MODIFICATION

		if (isset ( $_GET["done"])){
			if ( $_GET["done"] == "new_pseudo"){
				echo"<h6>Your pseudo has been changed .</h6>";
			} elseif ( $_GET["done"] == "new_firstname"){
				echo"<h6>Your firstname has been changed .</h6>";
			} elseif ( $_GET["done"] == "new_name"){
				echo"<h6>Your name has been changed .</h6>";
			} elseif ( $_GET["done"] == "new_password"){
				echo"<h6>Your password has been changed .</h6>";
			} elseif ($_GET["done"] == "new_email"){
				echo"<h6>Your email has been changed .</h6>";
			}
		}

		echo "<form action='../view/account_settings.php' method='GET'>
						<button class='button2'>Settings</button>
					</form>";
		echo "<br>";
?>
