<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (isset($_COOKIE['toto']) && !isset($_GET['status'])) {
			require_once("../model/caddy_modele.php");
			require_once("../view/caddy_view.php");
		}elseif (isset($_COOKIE['toto']) && $_GET['status']=="false") {
			require_once("../model/caddy_modele.php");
			require_once("../view/caddy_view.php");
			echo "You don't have enough money to conclude your order.";
		}elseif (isset($_COOKIE['toto']) && $_GET['status']=="true") {
			require_once("../model/caddy_modele.php");
			require_once("../view/caddy_view.php");
			echo "The transaction has been confirmed";
		}else{
			require_once("../view/caddy_view.php");
		}
	}
?>
