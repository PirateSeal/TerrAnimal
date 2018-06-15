<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		$iduser = $_GET['id_user'];
		require_once("../model/user_account.php");
		require_once("../view/user_account.php");
	}
?>