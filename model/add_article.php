<?php

	$register_article = function(){
	//RECUPERATION DE ID_USER GRACE AU PSEUDO

		$sql = "SELECT id_user FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'";
		$req = $db_connexion->query($sql);
		$data = $req -> fetch();
		$id= $data[0];

	//RECUPERATION DE ID_SPECIE GRACE AU NAME

		$sql2 = "SELECT id_specie FROM species WHERE name = '".$_GET["name"]."'";
		$req2 = $db_connexion->query($sql);
		$data2 = $req2 -> fetch();
		$specie = $data2[0];


		if ( empty ( $descri ) || empty ( $price ) || $stock == '0' || empty ($size) || empty($color) ){
			header("location: ../view/add_article.php?error=incomplete");
		} else {
			$sql= "INSERT INTO articles (id_article, id_specie, id_user, description, unit_price, stock, gender, diet, weight, size, color, age, status) VALUES (NULL, '".$specie."', '".$id."', '".$descri."', '".$price."', '".$stock."', '".$gender."', '".$diet."', '".$weight."', '".$size."', '".$color."', '".$age."', 'available')";
			$stmt = $db_connexion->prepare($sql);
			$stmt->execute();
			header("location: ../view/add_article.php?validation=confirmed");
		}
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
