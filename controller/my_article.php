<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		include("../view/header.php");
		require_once("../model/my_article.php");
		require_once("../view/my_article.php");
	}


?>
