<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (isset($_GET['id_user'])) {
			$iduser = $_GET['id_user'];
		} else {
			echo "1";
			if (isset($_GET['id_transa'])) {
				echo "oui";
				$transa = $_GET['id_transa'];
			} elseif (isset($_POST['id_transa'])) {
				echo "non";
				$transa = $_GET['id_transa'];
			}
			require_once("../model/user_account_data.php");
			$iduser = $seller;

			if (isset($_POST['vote']) && $_POST['vote'] == "oui") {
			echo "2";
			$transa = $_POST['id_transa'];
			$vote = $_POST['note'];
			require_once("../model/vote.php");
			} else {
			require_once("../model/user_account.php");
			require_once("../view/user_account.php");
			}
		}
		
/*		if (isset($_POST['vote']) && $_POST['vote'] == "oui") {
			echo "2";
			$transa = $_GET['id_transa'];
			$vote = $_POST['note'];
			require_once("../model/vote.php");
		} else {
		require_once("../model/user_account.php");
		require_once("../view/user_account.php");
		}*/
	}
?>