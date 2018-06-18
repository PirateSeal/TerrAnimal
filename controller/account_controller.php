<?php
	require_once("../controller/loged_or_not.php");
	include("../view/account.php");
  // AFFICHAGE DES INFORMATIONS ACTUELLES DE L'UTILISATEUR .

	require_once("../controller/db_connexion.php");
  	$data = $db_connexion->query("SELECT * FROM users WHERE pseudo='".$_SESSION["pseudo"]."'")->fetch();
  	echo "Pseudo :".$data["pseudo"]."<br>
        	Email :".$data["email"]."<br>
        	Firstname :".$data["firstname"]."<br>
        	Name :".$data["name"]."<br>
        	Note :".$data["note"]."<br>";

	echo '<a href="../controller/controller_orders.php"><button>View my orders</button></a>';

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
						<button>Settings</button>
					</form>";
?>
