<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		include("../view/header.php");
		require_once("../model/product_page_modele.php");
		require_once("../view/product_page_view.php");
	}
?>
