<?php
	
	$pdo = new PDO('mysql:host=localhost;dbname=bdd_terrabay','root','');

	$sql = 'select species.name as specie, unit_price, stock, gender, diet, weight, size, color, age, firstname, users.name from species inner join articles on species.id_specie = articles.id_specie inner join users on articles.id_user = users.id_user where id_article = '.$_GET["id"].';';
	$req = $pdo->query($sql);


	while ($row = $req->fetch(PDO::FETCH_ASSOC)){
		$data=$row;
	}
	$req->closeCursor();


	if (isset($_COOKIE['toto'])) {
		$caddy = $_COOKIE['toto'];
		$caddy = explode(";", $caddy);
		$caddy = array_count_values($caddy);

		if ($caddy[$_GET["id"]] == $data['stock']) {
			$status = 1;
		}else{
			$status =0;
		}
	}else{
		$status =0;
	}


?>