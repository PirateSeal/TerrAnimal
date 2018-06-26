<?php
	require_once("../controller/db_connexion.php");

	
	$sql ='select id_user,balance from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $db_connexion->query($sql);
	$user_data = $req->fetch();

	if (isset($_COOKIE['toto'])) {
		$data = $_COOKIE['toto'];
		$data = explode(";", $data);
		//
	
		for ($i=0; $i < count($data); $i++) { 
			$sql = 'select name, unit_price, id_article from articles inner join species on species.id_specie = articles.id_specie where id_article ='.$data[$i];
			$req = $db_connexion->query($sql);
			while($row = $req->fetch(PDO::FETCH_ASSOC)){
				$recup[$i] = $row;
			}
			$req->closeCursor();
		}
	}
	
?>



