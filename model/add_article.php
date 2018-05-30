<?php

	$register_article = function(){
	//RECUPERATION DE ID_USER GRACE AU PSEUDO
		require_once("../controller/db_connexion.php");

		$sql = "SELECT id_user FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'";
		$req = $db_connexion->query($sql);
		$data = $req -> fetch();
		$id= $data[0];

	//RECUPERATION DE ID_SPECIE GRACE AU NAME

		$sql2 = "SELECT id_specie FROM species WHERE name = '".$_GET["name"]."'";
		$req2 = $db_connexion->query($sql);
		$data2 = $req2 -> fetch();
		$specie = $data2[0];

		$sql= "INSERT INTO articles (id_article, id_specie, id_user, description, unit_price, stock, gender, diet, weight, size, color, age, status) VALUES (NULL, '".$_GET['specie']."', '".$id."', '".$_GET['description']."', '".$_GET['price']."', '".$_GET['stock']."', '".$_GET['gender']."', '".$_GET['diet']."', '".$_GET['weight']."', '".$_GET['size']."', '".$_GET['color']."', '".$_GET['age']."', 'available')";
		$stmt = $db_connexion->prepare($sql);
		$stmt->execute();
	};

	$retrieve_species = function(){
		require_once("../controller/db_connexion.php");
		$sql = "select name from species";
		$req = $db_connexion->query($sql);
		$i=0;
		while ($recup = $req -> fetch()) {
			$data[$i] = $recup;
			$i++;
		}
		return $data;
	};
?>
