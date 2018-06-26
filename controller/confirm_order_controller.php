<?php
	SESSION_start();

//
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		include("../view/header.php");
		require_once("../model/confirm_order_model.php");
		if (isset($enough_money) && $enough_money == 0) {
			header("location:./caddy_controller.php?status=0");
		}else{
			header("location:./caddy_controller.php?status=true");
		}
	}
?>
