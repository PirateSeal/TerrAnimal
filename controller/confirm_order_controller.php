<?php
	SESSION_start();

	
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		require_once("../model/confirm_order_model.php");
		if ($enough_money == 0) {
			header("location:./caddy_controller.php?status=0");
		}else{
			header("location:./caddy_controller.php?status=true");
		}
	}
?>

