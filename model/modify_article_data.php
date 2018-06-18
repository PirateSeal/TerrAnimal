<?php
	require_once("../controller/db_connexion.php");
	$sql = "select name from species";
	$req = $db_connexion->query($sql);
	$i=0;
	while ($recup = $req -> fetch()) {
		$data[$i] = $recup;
		$i++;
	}
	if (isset($idarticle)) {
		$sql2 = 'select description, unit_price, stock, weight, size, color, age from articles where id_article = '.$idarticle.';';
		$req2 = $db_connexion->query($sql2);
		$i=0;
		while ($row = $req2 -> fetch(PDO::FETCH_ASSOC)) {
			$info = $row;
		}
	}
?>