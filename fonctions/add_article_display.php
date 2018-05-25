<?php
	require_once("db_connexion.php");
	$sql = "select name from species";
	$req = mysqli_query($db_connexion, $sql);
	$i=0;
	while ($recup = mysqli_fetch_array($req, MYSQLI_NUM)){
		$data[$i]= $recup;
		$i++;
	}

	echo "Description :<input type='text' name='description' value=''><br>";

	echo "Specie :<select name='name'>";
	for ($i=0; $i < count($data) ; $i++) { 
		echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
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

	echo "Food :<select name='diet'>
		<option value='Carnivorous'>Carnivorous</option>
		<option value='Herbivorous'>Herbivorous</option>
		<option value='Omnivorous'>Omnivorous</option>
		</select></br>";

	echo "Weight :<input type='text' name='weight' value=''><br>";

	echo "Size :<input type='text' name='size' value=''><br>";

	echo "Color :<input type='text' name='color' value=''><br>";

	echo "Age :<input type='text' name='age' value=''><br>";

?>

