<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])) {
		header("location: ../index.php");
	} else {
		require_once("../model/add_article_v2.php");
		require_once("../view/add_article_v2.php");
	}
?>