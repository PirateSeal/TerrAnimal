<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{

		$db_connexion = new PDO('mysql:host=localhost;dbname=db_terrabay','root','');

		$sql = "SELECT id_user FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'";
		$req = $db_connexion->query($sql);
		$data = $req -> fetch();
		$id= $data[0];

		$sql = 'select description, unit_price, stock, gender, diet, weight, size, color, age from articles where id_article = '.$id.';';
		$req = $db_connexion->query($sql);


		while ($row = $req->fetch()){
			$data=$row;
		}
		$req->closeCursor();

		require_once("../model/modify_article.php");
		require_once("../view/modify_article.php");
	

	}
?>