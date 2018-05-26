<?php
	session_start();


	if (!isset($_COOKIE['toto'])) {
		setcookie("toto", $_GET["id"], time()+3600,"/");
		header("location:../product_page.php?id=".$_GET["id"]."");
	}else{
		$a=$_COOKIE['toto'].";".$_GET['id'];
		setcookie("toto", $a,time()+3600,"/");
		header("location:../product_page.php?id=".$_GET["id"]."");
	}

?>
