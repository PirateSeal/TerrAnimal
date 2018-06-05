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
			$test = 0;
			for ($i=0; $i < count($verif); $i++) { 
				if (!isset($_POST[$verif[$i]])) {
					$test=1;
					break;
				}
			}

			if (!isset($_POST['stock']) || intval($_POST['stock'])==0 ) {
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
	}
?>