<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		if (!isset($_GET['go'])) {
			include("../view/header.php");
			require_once("../model/add_article_retrieve.php");
			require_once("../view/view_add_bid.php");
		} else if (isset($_GET['go']) && $_GET['go']=="add") {
			$verif = ["description", "name", "price", "gender", "diet", "weight", "size", "size", "color", "age"];
			$test = 0;
			for ($i=0; $i < count($verif); $i++) {
				if (!isset($_POST[$verif[$i]])) {
					$test=1;
				}
			}

			if (!isset($_POST['stock']) || intval($_POST['stock'])==0 ) {
				$test=1;
			}


			if ($test == 1) {
				require_once("../model/add_article_retrieve.php");
				include("../view/header.php");
				require_once("../view/view_add_bid.php");
			} else {
				require_once("../model/add_bid_insert.php");
				require_once("../model/add_article_retrieve.php");
				include("../view/header.php");
				$test=0;
				require_once("../view/view_add_bid.php");

			}

		}elseif ($_GET['go']=="add_specie") {
			$test=2;
			include("../view/header.php");
			require_once("../view/view_add_bid.php");
		}
	}
?>
