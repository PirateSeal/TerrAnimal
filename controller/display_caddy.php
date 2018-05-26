<?php
	require_once("db_connexion.php");
	if (isset($_COOKIE['toto'])) {
		$data = $_COOKIE['toto'];
		$data = explode(";", $data);

		for ($i=0; $i < count($data); $i++) { 
			$sql = 'select name, unit_price from articles inner join species on species.id_specie = articles.id_specie where id_article ='.$data[$i];
			$req = mysqli_query($db_connexion, $sql);
			$recup = mysqli_fetch_array($req, MYSQLI_NUM);
			mysqli_free_result($req);
	

			echo "<table border=1px>
				<tr><td>".$recup[0]."</td><td>".$recup[1]." $</td><td><form action='./fonctions/delete_caddy_article.php?id=".$i." method='GET'><button>supprimer</button></form>'</td></tr>
				<br>";
		}

	}else{
		echo "You don't have any articles in your caddy";
	}
	
?>
