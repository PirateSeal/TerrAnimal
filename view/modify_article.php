<!DOCTYPE html>
<html>
<head>
	<title>Modify your article</title>
</head>
<body>
	<form action="../model/modify_article.php" method="GET">
		<?php
			echo "Description : <input type='text' name='description' value='".$data["description"]."'><br><br>";

		?>		
		Specie : <select name='name' id="name">
			<?php	
				require_once("../controller/db_connexion.php");
				$sql = "select name from species";
				$reqs = mysqli_query($db_connexion, $sql);
				$i=0;
				while ($recup = mysqli_fetch_array($reqs, MYSQLI_NUM)){
					$specie[$i]= $recup;
					$i++;
				}
				for ($i=0; $i < count($specie) ; $i++) { 
					echo "<option value='".$specie[$i][0]."'>".$specie[$i][0]."</option>";
				} 
			?>				
		</select><br><br>

		<?php
			echo "Price : <input type='text' name='price' id='price' value='".$data["price"]."'> In dollars <br><br>

			Number of products : <input type='text' name='stock' id='stock' value='".$data["stock"]."'><br><br>

			Gender : <select name='gender' id='gender'>
				<option value='0'>Male</option>
				<option value='1'>Female</option>
				<option value='2'>Hermaphrodite</option>
			</select><br><br>

			Food : <select name='diet' id='diet'>
				<option value='Carnivorous'>Carnivorous</option>
				<option value='Herbivorous'>Herbivorous</option>
				<option value='Omnivorous'>Omnivorous</option>
			</select><br><br>

			>Weight : <input type='text' name='weight' id='weight' value='".$data["weight"]."'> In kilograms<br><br>

			Size : <input type='text' name='size' id='size' value='".$data["size"]."'> In meters<br><br>

			Color : <input type='text' name='color' id='color' value='".$data["color"]."'><br><br>

			Age : <input type='text' name='age' id='age' value='".$data["age"]."'><br><br>";

		?>

		<button>Submit</button>
	</form>

	<?php
	if (isset($_GET["error"])){
		if ($_GET["error"] == "incomplete"){
			echo "<h4>Please complete all fields .</h4>";
		}
	} else if (isset($_GET["validation"]) && $_GET["validation"] == "confirmed") {
		echo "Your modifications has been confirmed .<br>You will be redirected in 3 seconds<br>";
			header("Refresh:3;Url=my_article.php");
	}
?>
</body>
</html>