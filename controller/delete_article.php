<?php
SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (isset($_GET['id'])) {
			$idarticle = $_GET['id'];
			require_once("../model/delete_article.php");
			header("location:../controller/my_article.php");
		}
	}
?>