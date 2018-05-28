<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		require_once("db_connexion.php");
		$sql = "select name from species";
		$req = mysqli_query($db_connexion, $sql);
		$i=0;
		while ($recup = mysqli_fetch_array($req, MYSQLI_NUM)){
			$data[$i]= $recup;
			$i++;
		}
		require_once("../model/add_article.php");
		require_once("../view/add_article.php");
	}

?>