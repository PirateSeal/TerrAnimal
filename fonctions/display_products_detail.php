<?php


	require_once("db_connexion.php");
	echo $_SESSION['id'];
	$sql = 'select species.name, unit_price, stock, gender, diet, weight, size, color, age, firstname, users.name from species inner join articles on species.id_specie = articles.id_specie inner join users on articles.id_user = users.id_user where id_article = '.$_GET["id"].';';
	$req = mysqli_query($db_connexion, $sql);
	$i=0;


	$recup = mysqli_fetch_array($req, MYSQLI_NUM);
	$data = $recup;


	mysqli_free_result($req);
	mysqli_close($db_connexion);


?>