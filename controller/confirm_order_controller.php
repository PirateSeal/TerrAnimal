<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		require_once("../model/confirm_order_model.php");
		if ($enough_monney == false) {
			header("location :./caddy_controller.php?status=false");
		}else{
			header("location :./caddy_controller.php?status=false");
		}
	}
?>

