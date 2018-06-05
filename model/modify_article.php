<?php
	$pdo = new PDO('mysql:host=localhost;dbname=db_terrabay','root','');
	$sql ='select id_user from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $pdo->query($sql);
	$id = $req->fetch();

	$req->closeCursor();

	$sql2 = "SELECT id_specie FROM species WHERE name = '".$_GET["name"]."'";
	$req2 = $db_connexion->query($sql);
	$data2 = $req2 -> fetch();
	$specie = $data2[0];

	if ( empty ( $descri ) || empty ( $price ) || $stock == '0' || empty ($size) || empty($color) ){
		header("location:../view/modify_article.php?error=incomplete");
	} else {
			$sql ='update articles set description="'.$_GET["description"].'", unit_price="'.$_GET["unit_price"].'", stock="'.$_GET["stock"].'", gender="'.$_GET["gender"].'", diet="'.$_GET["diet"].'", weight="'.$_GET["weight"].'", size="'.$_GET["size"].'", color="'.$_GET["color"].'", age="'.$_GET["age"].'"  WHERE id_user="'.$recup[$i]['id_user'].'"';
			$pdo->exec($sql);
		header("location:../view/modify_article.php?validation=confirmed");
	}
?>