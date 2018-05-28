<?php

	$pdo = new PDO('mysql:host=localhost;dbname=bdd_terrabay','root','');
	$sql ='select id_user from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $pdo->query($sql);
	$id = $req->fetch();



	$sql = 'select id_article, unit_price, species.name from users inner join articles on users.id_user = articles.id_user inner join species on articles.id_specie = species.id_specie where users.id_user == "'.$id['id_user'].'"';
	$req = $pdo->query($sql);

	$i=0;
	while ($row = $req->fetch()){
		$data[$i]=$row;
		$i++;
	}
	$req->closeCursor();


?>