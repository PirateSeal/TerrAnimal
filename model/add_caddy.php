<?php
	session_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (!isset($_COOKIE['toto'])) {
			setcookie("toto", $_GET["id"], time()+3600,"/");
			header("location:../controller/product_page_controller.php?id=".$_GET["id"]."");
		}else{
			$a=$_COOKIE['toto'].";".$_GET['id'];
			setcookie("toto", $a,time()+3600,"/");
			header("location:../controller/product_page_controller.php?id=".$_GET["id"]."");
		}
	}


?>
