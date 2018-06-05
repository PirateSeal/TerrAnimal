<?php
	require_once("../controller/db_connexion.php");
	$sql = "select name from species";
	$req = $db_connexion->query($sql);
	$i=0;
	while ($recup = $req -> fetch()) {
		$data[$i] = $recup;
		$i++;
	}
?>