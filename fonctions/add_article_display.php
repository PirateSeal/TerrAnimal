<?php
	require_once("db_connexion.php");
	$sql = "select name from species";
	$req = mysqli_query($db_connexion, $sql);
	$recup = mysqli_fetch_array($req, MYSQLI_NUM);

	echo "Description :<input type='text' value='description'>"
	echo "<select id='name'>";
	
	for ($i=0; $i < count($recup) ; $i++) { 
		echo "<option value='".$recup[$i]."'>".$recup[$i]."</option>";
	}
	echo "</select>";
	mysqli_free_result($req);

	echo "Price :<input type='text' value='price'>";

	echo "Number of products :<input type='text' value='stock'>";

	echo "Gender :<select id='gender'>";
	echo "<option value='0'>Male</option>";
	echo "<option value='1'>Female</option>";
	echo "<option value='2'>Hermaphrodite</option>";
	echo "</select>";

	echo "Food :<input type='text' value='diet'>";

	echo "Weight :<input type='text' value='weight'>";

	echo "Size :<input type='text' value='size'>";

	echo "Color :<input type='text' value='color'>";

	echo "Age :<input type='text' value='age'>"

?>

