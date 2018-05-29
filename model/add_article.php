<?php
	require_once("../controller/db_connexion.php");
	$descri= htmlspecialchars($_GET["description"]);
	$price= htmlspecialchars($_GET["price"]);
	$stock= htmlspecialchars($_GET["stock"]);
	$gender= $_GET["gender"];
	$diet= $_GET["diet"];
	$weight= htmlspecialchars($_GET["weight"]);
	$size= htmlspecialchars($_GET["size"]);
	$color= htmlspecialchars($_GET["color"]);
	$age= htmlspecialchars($_GET["age"]);
	$pseudo= $_SESSION["pseudo"];

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
		header("location:../view/add_article.php?error=incomplete");
	} else {
		$sql= "INSERT INTO articles (id_article, id_specie, id_user, description, unit_price, stock, gender, diet, weight, size, color, age) VALUES (NULL, '".$specie."', '".$id."', '".$descri."', '".$price."', '".$stock."', '".$gender."', '".$diet."', '".$weight."', '".$size."', '".$color."', '".$age."')";
		$sql->execute();
		header("location:../view/add_article.php?validation=confirmed");
	}
?>
