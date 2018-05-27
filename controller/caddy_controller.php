<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (isset($_COOKIE['toto'])) {
			require_once("../model/caddy_modele.php");
			require_once("../view/caddy_view.php");
		}else{
			require_once("../view/caddy_view.php");
		}
	}
	
?>
