<?php

	require_once("../controller/db_connexion.php");
	$sql ='select id_user,balance from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $db_connexion->query($sql);
	$user_data = $req->fetch();
	$sql = 'SELECT id_article, unit_price, description, species.name, articles.photo_path FROM users INNER JOIN articles ON users.id_user = articles.id_user INNER JOIN species ON articles.id_specie = species.id_specie WHERE users.id_user != "'.$user_data['id_user'].'"and articles.status="available" ';

	$req = $db_connexion->query($sql);



	$i=0;
	while ($row = $req->fetch()){
		$data[$i]=$row;
		$i++;
	}


	$req->closeCursor();


?>
