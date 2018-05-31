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
			$today = date("H:i:s");
			echo $today ;
			echo "<br>";
			echo rand(5, 15);

			// offre de la demieheure :
			// Je vais avoir besoin d'une date de debut , une date de fin .
			// tiré un nombre random qui va correspondre a l'id d'un article entre 1 et la totalité des articles en boucle tans qu'on a pas trouvé un articles
			// peut etre que le client devrait avoir le choix de s'il veut que son produit soit en vente du jour ou non ?
			// modifier l'article en lui appliquant une reduction au debut et a la fin .
			// peut etre un random sur la reduction entre 10 et 75 ? ou au choix du vendeur  ?
			// donc une table avec au moin id_article date_start date_end  /!\

			// enchere :
			// Je vais avoir besoin d'une date de début une date de fin .
			// Le vendeur doit pouvoir accepté une offre quand il le souhaite .
			// Les clients peuvent enchérire sur n'importe quel enchère lorsqu'elle est active et que l'offre est plus forte que l'offre actuel .
			// Si le vendeur accepte ou que le temps est écoulé le dernier acheteur recoit une notification ???? et est débité .
			// le vendeur est payer ajout dans les logs de ventes

		?>
	</body>
</html>
