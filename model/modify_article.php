<?php

		require_once("../controller/db_connexion.php");

		$sql2 = "SELECT id_specie FROM species WHERE name = '".$_POST["name"]."'";
		$req2 = $db_connexion->query($sql2);
		$data2 = $req2 -> fetch();
		$specie = $data2[0];
		if (isset($_POST['id'])) {
			$sql = 'update articles set description="'.$_POST["description"].'", id_specie="'.$specie.'", unit_price="'.$_POST["unit_price"].'", stock="'.$_POST["stock"].'", gender="'.$_POST["gender"].'", diet="'.$_POST["diet"].'", weight="'.$_POST["weight"].'", size="'.$_POST["size"].'", color="'.$_POST["color"].'", age="'.$_POST["age"].'"  WHERE id_article="'.$idarticle.'"';
			$temp = $db_connexion->prepare($sql);
			$temp->execute();
		}
?>