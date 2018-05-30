<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (!isset($_GET['go'])) {
			require_once("../model/add_article.php");
			$data = $retrieve_species();
			require_once("../view/add_article.php");
		} else if ($_POST['go']="add") {
			$verif = ["description", "name", "price", "gender", "diet", "weight", "size", "size", "color", "age"];

			for ($i=0; $i < count($verif); $i++) { 
				if (!isset($_GET[$verif[$i]])) {
					$test=1;
					break;
				}
			}

			if (!isset($_GET['stock']) || intval($_GET['stock'])==0 ) {
				$test=1;
			}


			if ($test == 1) {
				require_once("../model/add_article.php");
				$data = $retrieve_species();
				require_once("../view/add_article.php");
			} else {
				require_once("../model/add_article.php");
				$register_article();
				$test=0;
				require_once("../view/add_article.php");

			}

		}

/*
		$descri= htmlspecialchars($_GET["description"]);
		$price= htmlspecialchars($_GET["price"]);
		$stock= htmlspecialchars($_GET["stock"]);
		$gender= $_GET["gender"];
		$diet= $_GET["diet"];
		$weight= htmlspecialchars($_GET["weight"]);
		$size= htmlspecialchars($_GET["size"]);
		$color= htmlspecialchars($_GET["color"]);
		$age= htmlspecialchars($_GET["age"]);
		$pseudo= $_SESSION["pseudo"];


*/
	}
?>