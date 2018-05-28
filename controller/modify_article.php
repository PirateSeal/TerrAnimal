<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{

		$pdo = new PDO('mysql:host=localhost;dbname=db_terrabay','root','');

		$sql = 'select description, unit_price, stock, gender, diet, weight, size, color, age from articles where id_article = '.$_GET["id"].';';
		$req = $pdo->query($sql);


		while ($row = $req->fetch(PDO::FETCH_ASSOC)){
			$data=$row;
		}
		$req->closeCursor();

		require_once("../model/modify_article.php");
		require_once("../view/modify_article.php");
	

	}
?>