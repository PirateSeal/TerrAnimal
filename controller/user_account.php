<?php
	require("../controller/loged_or_not.php");
	include("../view/header.php");
	if (isset($_GET['id_user'])) {
		$iduser = $_GET['id_user'];
		require_once("../model/user_account.php");
		require_once("../view/user_account.php");
	} else {
		if (isset($_GET['id_transa'])) {
			$transa = $_GET['id_transa'];
		} elseif (isset($_POST['id_transa'])) {
			$transa = $_POST['id_transa'];
		}
		require_once("../model/user_account_data.php");
		$iduser = $seller;
		if (isset($_GET['vote']) && $_GET['vote'] == "oui") {
			$transa = $_POST['id_transa'];
			$vote = $_POST['note'];
			require_once("../model/vote.php");
			require_once("../model/user_account.php");
			require_once("../view/user_account.php");
		} else {

			require_once("../model/user_account.php");
			echo "<center><h2>Ranking you seller .</h2></center>";
			echo "<div id='box2'><br><center>";
			require_once("../view/user_account.php");
			echo "</div></center><br><br>";
		}
	}
?>
