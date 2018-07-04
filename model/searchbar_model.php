<?php

	require_once("../controller/db_connexion.php");
	$sql ='select id_user,balance from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $db_connexion->query($sql);
	$user_data = $req->fetch();
	$sql = 'select id_article, description,unit_price, species.name, articles.photo_path from users inner join articles on users.id_user = articles.id_user inner join species on articles.id_specie = species.id_specie where users.id_user != "'.$user_data['id_user'].'"and articles.status="available" and species.name like "%'.$_POST['search'].'%"';
	$req = $db_connexion->query($sql);

	$i=0;
	while ($row = $req->fetch()){
		$data[$i]=$row;
		$i++;
	}


	$req->closeCursor();


?>
