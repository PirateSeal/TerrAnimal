<?php
	require_once("db_connexion.php");
	$sql = "select name from species";
	$req = mysqli_query($db_connexion, $sql);
	$recup = mysqli_fetch_array($req, MYSQLI_NUM);

	echo "Description :<input type='text' name='description' value=''><br>";

	echo "Specie :<select name='name'>";
	for ($i=0; $i < count($recup) ; $i++) { 
		echo "<option value='".$recup[$i]."'>".$recup[$i]."</option>";
	}
	echo "</select><br>";
	mysqli_free_result($req);

	echo "Price :<input type='text' name='price' value=''><br>";

	echo "Number of products :<input type='text' name='stock' value=''><br>";

	echo "Gender :<select name='gender'>";
	echo "<option value='0'>Male</option>";
	echo "<option value='1'>Female</option>";
	echo "<option value='2'>Hermaphrodite</option>";
	echo "</select><br>";

	echo "Food :<input type='text' name='diet' value=''><br>";

	echo "Weight :<input type='text' name='weight' value=''><br>";

	echo "Size :<input type='text' name='size' value=''><br>";

	echo "Color :<input type='text' name='color' value=''><br>";

	echo "Age :<input type='text' name='age' value=''><br>";

?>

