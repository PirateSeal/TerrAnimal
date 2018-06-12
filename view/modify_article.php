<!DOCTYPE html>
<html>
<head>
	<title>Modify your article</title>
</head>
<body>
	<form action="../controller/modify_article.php?go=modify" method="POST">
		<?php
			echo "Description : <input type='text' name='description' value='".$info["description"]."'><br><br>";

		?>		
		Specie : <select name='name' id="name">
					<?php	
					for ($i=0; $i < count($data) ; $i++) { 
						echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
					} 
					?>				
		</select><br><br>

		<?php
			echo "Price : <input type='text' name='unit_price' id='unit_price' value='".$info["unit_price"]."'> In dollars <br><br>

			Number of products : <input type='text' name='stock' id='stock' value='".$info["stock"]."'><br><br>

			Gender : <select name='gender' id='gender'>
				<option value='0'>Male</option>
				<option value='1'>Female</option>
				<option value='2'>Hermaphrodite</option>
			</select><br><br>

			Food : <select name='diet' id='diet'>
				<option value='carnivorous'>Carnivorous</option>
				<option value='vegie'>Herbivorous</option>
				<option value='omnivorous'>Omnivorous</option>
			</select><br><br>

			Weight : <input type='text' name='weight' id='weight' value='".$info["weight"]."'> In kilograms<br><br>

			Size : <input type='text' name='size' id='size' value='".$info["size"]."'> In meters<br><br>

			Color : <input type='text' name='color' id='color' value='".$info["color"]."'><br><br>

			Age : <input type='text' name='age' id='age' value='".$info["age"]."'><br><br>";

		?>

		<button>Submit</button>
	</form>
</body>
</html>