<?php
	require_once("../controller/db_connexion.php");
	$sql = "SELECT id_user FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'";
	$req = $db_connexion->query($sql);
	$data = $req -> fetch();
	$id= $data[0];
	unset($data);

//RECUPERATION DE ID_SPECIE GRACE AU NAME DE L'ESPECE

	$sql2 = "SELECT id_specie FROM species WHERE name = '".$_POST["name"]."'";
	$req2 = $db_connexion->query($sql2);
	$data2 = $req2 -> fetch();
	$specie = $data2[0];
	if ($specie !== NULL) {
		$sql= "INSERT INTO articles (id_article, id_specie, id_user, description, unit_price, stock, gender, diet, weight, size, color, age, status,photo_path) VALUES (NULL, '".$specie."', '".$id."', '".$_POST['description']."', '".$_POST['price']."', '".$_POST['stock']."', '".$_POST['gender']."', '".$_POST['diet']."', '".$_POST['weight']."', '".$_POST['size']."', '".$_POST['color']."', '".$_POST['age']."', 'bid','../view/images/undefined_animal.jpg')";
		$stmt = $db_connexion->prepare($sql);
		$stmt->execute();
		$req_max ="SELECT * FROM articles WHERE id_article = ( SELECT Max(id_article) from articles );";
		$data = $db_connexion->query($req_max)->fetch();
		$sql1= "INSERT INTO `bids` (`id_bi`, `id_article`, `status`, `date_start`, `date_end`, `init_price`, `end_price`) VALUES (NULL, '".$data[0]."', 'active', '2018-06-27 00:00:00', '".$_POST['date']."', '".$_POST['price']."', '".$_POST['price']."')" ;
		$stmt = $db_connexion->prepare($sql1);
		$stmt->execute();

	}else{
		$sql ="INSERT INTO species (id_specie,name) VALUES (NULL,'".$_POST['name']."')";
		$req = $db_connexion->prepare($sql);
		$req ->execute();
		$sql2 = "SELECT id_specie FROM species where name='".$_POST["name"]."'";
		$req2 = $db_connexion->query($sql2);
		$data2 = $req2 -> fetch();
		$specie = $data2[0];
		$sql= "INSERT INTO articles (id_article, id_specie, id_user, description, unit_price, stock, gender, diet, weight, size, color, age, status) VALUES (NULL, '".$specie."', '".$id."', '".$_POST['description']."', '".$_POST['price']."', '".$_POST['stock']."', '".$_POST['gender']."', '".$_POST['diet']."', '".$_POST['weight']."', '".$_POST['size']."', '".$_POST['color']."', '".$_POST['age']."', 'bid','../view/images/undefined_animal.jpg')";
		$stmt = $db_connexion->prepare($sql);
		$stmt->execute();
		$sql1= "INSERT INTO `bids` (`id_bi`, `id_article`, `status`, `date_start`, `date_end`, `init_price`, `end_price`) VALUES (NULL, '".$id."', 'active', '2018-06-27 00:00:00', '".$_POST['date']."', '".$_POST['price']."', '".$_POST['price']."')" ;
		$stmt = $db_connexion->prepare($sql1);
		$stmt->execute();
	}

?>
