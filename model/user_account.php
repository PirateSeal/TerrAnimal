<?php
	require_once("../controller/db_connexion.php");
	$sql = 'select pseudo, email, firstname, name, note, photo_path from users where id_user = '.$iduser.';';
	$req = $db_connexion->query($sql);

	while ($row = $req->fetch(PDO::FETCH_ASSOC)){
		$data=$row;
	}
	$req->closeCursor();
	var_dump($data);	
?>