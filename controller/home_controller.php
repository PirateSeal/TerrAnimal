<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}elseif (!isset($_GET['go'])){
		require_once("../model/home_model.php");
		include("../view/header.php");
		require_once("../view/home_view.php");
	}elseif (isset($_GET['go']) && $_GET['go']=="search") {
		require_once("../model/searchbar_model.php");
		include("../view/header.php");
		require_once("../view/home_view.php");
	}


?>
