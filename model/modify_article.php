<?php
	$pdo = new PDO('mysql:host=localhost;dbname=db_terrabay','root','');
	$sql ='select id_user from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $pdo->query($sql);
	$id = $req->fetch();

	$req->closeCursor();

	$descri= htmlspecialchars($_GET["description"]);
	$price= htmlspecialchars($_GET["unit_price"]);
	$stock= htmlspecialchars($_GET["stock"]);
	$gender= $_GET["gender"];
	$diet= $_GET["diet"];
	$weight= htmlspecialchars($_GET["weight"]);
	$size= htmlspecialchars($_GET["size"]);
	$color= htmlspecialchars($_GET["color"]);
	$age= htmlspecialchars($_GET["age"]);

	$sql2 = "SELECT id_specie FROM species WHERE name = '".$_GET["name"]."'";
	$req2 = $db_connexion->query($sql2);
	$data2 = $req2 -> fetch();
	$specie = $data2[0];

	if ( empty ( $descri ) || empty ( $price ) || $stock == '0' || empty ($size) || empty($color) ){
		header("location:../view/modify_article.php?error=incomplete");
	} else {
			$sql ='update articles set description="'.$descri.'", unit_price="'.$price.'", stock="'.$stock.'", gender="'.$gender.'", diet="'.$diet.'", weight="'.$weight.'", size="'.$size.'", color="'.$color.'", age="'.$age.'"  WHERE id_user="'.$recup[$i]['id_user'].'"';
			$pdo->exec($sql);
		header("location:../view/modify_article.php?validation=confirmed");
	}
?>