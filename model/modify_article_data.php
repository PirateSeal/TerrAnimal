<?php
	require_once("../controller/db_connexion.php");
	$sql = "select name from species";
	$req = $db_connexion->query($sql);
	$i=0;
	while ($recup = $req -> fetch()) {
		$data[$i] = $recup;
		$i++;
	}

	$sql2 = "SELECT description, unit_price, stock, weight, size, color, age FROM articles WHERE id_article = '".$id."'";
	$req2 = $db_connexion->query($sql2);
	$i=0;
	while ($recup = $req2 -> fetch()) {
		$info[$i] = $recup;
		echo $info;
		$i++;
	}
?>