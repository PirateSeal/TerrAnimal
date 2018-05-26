<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		require_once("../model/home_model.php");
		require_once("../view/home_view.php");
	}


?>