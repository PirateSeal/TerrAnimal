<?php

		require_once("../controller/db_connexion.php");
/*		$sql = "SELECT id_user FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'";
		$req = $db_connexion->query($sql);
		$data = $req -> fetch();
		$id= $data[0];
		unset($data);
*/
		$sql2 = "SELECT id_specie FROM species WHERE name = '".$_POST["name"]."'";
		$req2 = $db_connexion->query($sql);
		$data2 = $req2 -> fetch();
		$specie = $data2[0];

		$sql = 'update articles set description="'.$_GET["description"].'", id_specie="'.$specie.'" unit_price="'.$_GET["unit_price"].'", stock="'.$_GET["stock"].'", gender="'.$_GET["gender"].'", diet="'.$_GET["diet"].'", weight="'.$_GET["weight"].'", size="'.$_GET["size"].'", color="'.$_GET["color"].'", age="'.$_GET["age"].'"  WHERE id_article="'.$id.'"';
		$pdo->exec($sql);


//	$sql2 = "SELECT id_specie FROM species WHERE name = '".$_GET["name"]."'";
//	$req2 = $db_connexion->query($sql);
//	$data2 = $req2 -> fetch();
//	$specie = $data2[0];

//	if ( empty ( $descri ) || empty ( $price ) || $stock == '0' || empty ($size) || empty($color) ){
//		header("location:../view/modify_article.php?error=incomplete");
//	} else {
//			$sql ='update articles set description="'.$_GET["description"].'", unit_price="'.$_GET["unit_price"].'", stock="'.$_GET["stock"].'", gender="'.$_GET["gender"].'", diet="'.$_GET["diet"].'", weight="'.$_GET["weight"].'", size="'.$_GET["size"].'", color="'.$_GET["color"].'", age="'.$_GET["age"].'"  WHERE id_user="'.$recup[$i]['id_user'].'"';
//			$pdo->exec($sql);
//		header("location:../view/modify_article.php?validation=confirmed");
//	}
?>