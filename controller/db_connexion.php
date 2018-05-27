<?php
	// CRÉATION DES VARIABLES DE CONNEXION A LA BASE DE DONNÉE
	$host = "localhost";
	$user = "root";
	$bdd	= "bdd_terrabay";
	$password = "";
	// TENTATIVE ACCES A LA BASE DE DONNÉE
	$db_connexion = mysqli_connect($host , $user , $password , $bdd) or die ("Erreur de connexion a la base de donnée ! ");
?>
