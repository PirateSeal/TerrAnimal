<?php
	SESSION_start();

	
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		require_once("../model/confirm_order_model.php");
		echo $enough_money;
		if ($enough_money == 0) {
			header("location :./caddy_controller.php");
		}else{
			header("location :./caddy_controller.php?status=false");
		}
	}
?>

