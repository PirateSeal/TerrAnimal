<?php
	
	$pdo = new PDO('mysql:host=localhost;dbname=bdd_terrabay','root','');

	$sql = 'select species.name, unit_price, stock, gender, diet, weight, size, color, age, firstname, users.name from species inner join articles on species.id_specie = articles.id_specie inner join users on articles.id_user = users.id_user where id_article = '.$_GET["id"].';';
	$req = $pdo->query($sql);


	while ($row = $req->fetch()){
		$data=$row;
	}
	$req->closeCursor();

?>