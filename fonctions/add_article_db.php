<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
	require_once("db_connexion.php");
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

	$req = mysqli_query($db_connexion, "SELECT id_user FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
	$data = mysqli_fetch_array($req, MYSQLI_NUM);
	$id= $data[0];
	mysqli_free_result($req);

	//RECUPERATION DE ID_SPECIE GRACE AU NAME

	$req2 = mysqli_query($db_connexion, "SELECT id_specie FROM species WHERE name = '".$_GET["name"]."'");
	$data2 = mysqli_fetch_array($req2, MYSQLI_NUM);
	$specie = $data2[0];


	if ( empty ( $descri ) || empty ( $price ) || empty ( $stock )|| empty ($size) || empty($color) ){
		header("location:../add_article.php?error=incomplete");
		echo "Blyat";
	} else {
		mysqli_query($db_connexion, "INSERT INTO articles (id_article, id_specie, id_user, description, unit_price, stock, gender, diet, weight, size, color, age) VALUES (NULL, '".$specie."', '".$id."', '".$descri."', '".$price."', '".$stock."', '".$gender."', '".$diet."', '".$weight."', '".$size."', '".$color."', '".$age."')");
		header("location:../add_article.php?validation=confirmed");
	}
?>