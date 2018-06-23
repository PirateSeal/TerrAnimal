<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}elseif (!isset($_GET['go'])){
		include("../view/header.php");
		require_once("../model/home_model.php");
		require_once("../view/home_view.php");
	}elseif (isset($_GET['go']) && $_GET['go']=="search") {
		include("../view/header.php");
		require_once("../model/searchbar_model.php");
		require_once("../view/home_view.php");
	}


?>
