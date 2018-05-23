<?php
	require_once("db_connexion.php");


	$sql = 'select id_article, unit_price, name from articles inner join species on articles.id_specie = species.id_specie where id_article;';
	$req = mysqli_query($db_connexion, $sql);


	$i=0;
	while ($recup = mysqli_fetch_array($req, MYSQLI_NUM)){
		$data[$i] = $recup;
		$i++;
	}

	mysqli_free_result($req);
	mysqli_close($db_connexion);

	for ($i=0; $i < count($data); $i++) { 
		//$j=$i+1;
		echo "<br><table border = 1px><tr><td>image</td></tr>
		<tr><td>".$data[$i][2]."</td></tr>
		<tr><td>Price :".$data[$i][1]." $</td></tr>
		<tr><td><form action='product_page.php?id=".$data[$i][0]."' method='POST'>
		<input type='submit' name='Details' value='Details'></form></td></tr></table><br>";
	}



?>
