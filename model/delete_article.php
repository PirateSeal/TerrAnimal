<?php
	require_once("../controller/db_connexion.php");
	
	$sql = "DELETE FROM `articles` WHERE `articles`.`id_article` = ".$idarticle.";";
	$temp = $db_connexion->prepare($sql);
			$temp->execute();
?>