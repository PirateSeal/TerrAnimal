<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (isset($_GET['id_user'])) {
			$iduser = $_GET['id_user'];
		} else {
			echo $_GET['id_transa'];
			$transa = $_GET['id_transa'];
			require_once("../model/user_account_data.php");
			$iduser = $seller;
		}
		
		if (isset($_POST['vote']) && $_POST['vote'] == "oui") {
			$transa = $_GET['id_transa'];
			$vote = $_POST['note'];
			require_once("../model/vote.php");
		} else {
		require_once("../model/user_account.php");
		require_once("../view/user_account.php");
		}
	}
?>