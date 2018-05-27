<?php

	$pdo = new PDO('mysql:host=localhost;dbname=bdd_terrabay','root','');

	$data = $_COOKIE['toto'];
	$data = explode(";", $data);


	for ($i=0; $i < count($data); $i++) { 
		$sql = 'select name, unit_price from articles inner join species on species.id_specie = articles.id_specie where id_article ='.$data[$i];
		$req = $pdo->query($sql);
		while($row = $req->fetch(PDO::FETCH_ASSOC)){
			$recup[$i] = $row;
		}
		print_r($recup);
		$req->closeCursor();
	}
?>



