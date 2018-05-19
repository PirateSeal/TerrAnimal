<?php
	// Créations des variables contenant toutes les informations de connexion .
	$host = "localhost";
	$user = "root";
	$bdd	= "bdd_terrabay";
	$password = "";
	// Tentative d'acces a la base de donnée .
	$db_connexion = mysqli_connect($host , $user , $password , $bdd) or die ("Erreur de connexion a la bade de donnée ! ");
?>
