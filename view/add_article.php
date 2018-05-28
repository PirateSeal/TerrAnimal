<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}
	require_once("db_connexion.php");
	$sql = "select name from species";
	$req = mysqli_query($db_connexion, $sql);
	$i=0;
	while ($recup = mysqli_fetch_array($req, MYSQLI_NUM)){
		$data[$i]= $recup;
		$i++;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>add_article</title>
</head>
<body>
	<form action='../controller/home_controller.php' method='GET'><button>Back</button></form>
	<br>
	<h1>Please inform information about the product you want to sell</h1>
	<br>
	<form action="../model/add_article.php" method="GET">
		<table>
			<tr>
				<td>Description : <input type='text' name='description' id="descri" class="" value=''></td><td><div id="erreur_descri">You must fill this field !</div></td>
			</tr>
			<tr>
				<td>Specie : <select name='name' id="name">
					<?php 	for ($i=0; $i < count($data) ; $i++) { 
						echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
					}?></select></td><td><div id="erreur_name"></div></td>
			</tr>
			<tr>
				<td>Price : <input type='text' name='price' id="price" value=''> In dollars</td><td><div id="erreur_price">You must fill this field !</div></td>
			</tr>
			<tr>
				<td>Number of products : <input type='text' name='stock' id="stock" value=''></td><td><div id="erreur_stock">This field can't be equal to 0 !</div></td>
			</tr>
			<tr>
				<td>Gender : <select name='gender' id="gender"><option value='0'>Male</option><option value='1'>Female</option><option value='2'>Hermaphrodite</option></select></td><td><div id="erreur_gender"></div></td>
			</tr>
			<tr>
				<td>Food : <select name='diet' id="diet"><option value='Carnivorous'>Carnivorous</option><option value='Herbivorous'>Herbivorous</option><option value='Omnivorous'>Omnivorous</option></select></td><td><div id="erreur_diet"></div></td>
			</tr>
			<tr>
				<td>Weight : <input type='text' name='weight' id="weight" value=''> In kilograms</td><td><div id="erreur_weight"></div></td>
			</tr>
			<tr>
				<td>Size : <input type='text' name='size' id="size" value=''> In meters</td><td><div id="erreur_size">You must fiil this field !</div></td>
			</tr>
			<tr>
				<td>Color : <input type='text' name='color' id="color" value=''></td><td><div id="erreur_color">You must fiil this field !</div></td>
			</tr>
			<tr>
				<td>Age : <input type='text' name='age' id="age" value=''></td><td><div id="erreur_age"></div></td>
			</tr>
		</table>
		<button>Submit</button>
	</form>

<?php
	if (isset($_GET["error"])){
		if ($_GET["error"] == "incomplete"){
			echo "<h4>Please complete all fields .</h4>";
		}
	} else if (isset($_GET["validation"]) && $_GET["validation"] == "confirmed") {
		echo "Your add has been confirmed .<br>You will be redirected in 3 seconds<br>";
			header("Refresh:3;Url=home.php");
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="../controller/add_article.js"></script>

</body>
</html>
