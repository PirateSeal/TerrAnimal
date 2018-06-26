<?php
	require_once("../controller/loged_or_not.php");
		if (isset($_COOKIE['toto']) && !isset($_GET['status'])) {
			include("../view/header.php");
			require_once("../model/caddy_modele.php");
			$order = 1;
			require_once("../view/caddy_view.php");
		}elseif (isset($_COOKIE['toto']) && $_GET['status']=="0") {
			include("../view/header.php");
			require_once("../model/caddy_modele.php");
			$order = 0;
			//
			require_once("../view/caddy_view.php");
			echo "You don't have enough money to conclude your order.";
		}elseif (isset($_COOKIE['toto']) && $_GET['status']=="1") {
			include("../view/header.php");
			require_once("../model/caddy_modele.php");
			$order = 0;
			require_once("../view/caddy_view.php");
			echo "The transaction has been confirmed";
		}else{
			include("../view/header.php");
			require_once("../model/caddy_modele.php");
			$order = 0;
			require_once("../view/caddy_view.php");
		}
	if (isset($_GET["status"])){
		echo "Your order was confirmed with success .<br><br>";
	}
?>
