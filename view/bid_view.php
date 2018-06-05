<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>TerraBay Account</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<form action='../controller/home_controller.php' method='GET'>
			<button>Back</button></form>
		</form>
		<?php
			include("../controller/db_connexion.php");
			$today = date("H:i:s");
			echo $today ;
			echo "<br>";
			echo rand(5, 15);
			$req_article = "SELECT COUNT(*) FROM articles ";
			$how_much = $db_connexion->query($req_article)->fetch();
			echo "<br>";
			echo $how_much['COUNT(*)'] ;
			echo"<br><br>";
			$req_discount = "SELECT * FROM discounts where id_article=( SELECT MAX(id_article) FROM discounts )";
			$what = $db_connexion->query($req_discount)->fetch();
			echo($what["id_article"]);

			$req_data = "SELECT * FROM articles WHERE id_article = '".$what['id_article']."'";
			$data = $db_connexion->query($req_data)->fetch();
			echo "<br>-----------------------";
			echo $data["description"];
			echo "-----------------------<br>";


		?>
	</body>
</html>
