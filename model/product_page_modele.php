<?php
	
	require_once("../controller/db_connexion.php");
	$sql = 'select species.name as specie, unit_price, stock, gender, diet, weight, size, color, age, firstname, users.name, users.id_user from species inner join articles on species.id_specie = articles.id_specie inner join users on articles.id_user = users.id_user where id_article = '.$_GET["id"].';';
	$req = $db_connexion->query($sql);


	while ($row = $req->fetch(PDO::FETCH_ASSOC)){
		$data=$row;
	}
	$req->closeCursor();
	var_dump($data);


	if (isset($_COOKIE['toto'])) {
		$caddy = $_COOKIE['toto'];
		$caddy = explode(";", $caddy);
		$caddy = array_count_values($caddy);

		if (isset($caddy[$_GET["id"]]) && $caddy[$_GET["id"]] == $data['stock']) {
			$status = 1;
		}else{
			$status =0;
		}
	}else{
		$status =0;
	}


?>