<?php

	$pdo = new PDO('mysql:host=localhost;dbname=bdd_terrabay','root','');

	$sql = 'select id_article, unit_price, name from articles inner join species on articles.id_specie = species.id_specie where id_article;';
	$req = $pdo->query($sql);

	$i=0;
	while ($row = $req->fetch()){
		$data[$i]=$row;
		$i++;
	}
	$req->closeCursor();


?>