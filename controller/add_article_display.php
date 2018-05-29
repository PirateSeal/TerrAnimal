<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		require_once("db_connexion.php");
		$sql = "select name from species";
		$req = $db_connexion->query($sql);
		$i=0;
		while ($recup = $req -> fetch()){
			$data[$i]= $recup;
			$i++;
		}
		require_once("../view/add_article.php");
	}

?>