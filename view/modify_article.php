<center><h2>Modify your article</h2></center>
<div id="box">
<form action="../controller/modify_article.php?go=modify" method="POST"><br>
		<?php
			echo "Description : <br><input type='text' name='description' value='".$info["description"]."'><br><br>";
		?>
		Specie : <select name='name' id="name">
					<?php
					for ($i=0; $i < count($data) ; $i++) {
						echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
					}
					?>
		</select><br><br>

		<?php
			echo "Price in dollars : <br><input type='text' name='unit_price' id='unit_price' value='".$info["unit_price"]."'> <br>

			Number of products : <br><input type='text' name='stock' id='stock' value='".$info["stock"]."'><br><br>

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

			Weight in kilograms : <br><input type='text' name='weight' id='weight' value='".$info["weight"]."'><br>

			Size in meters : <br><input type='text' name='size' id='size' value='".$info["size"]."'><br>

			Color : <br><input type='text' name='color' id='color' value='".$info["color"]."'><br>

			Age : <br><input type='text' name='age' id='age' value='".$info["age"]."'><br><br>

			<input type='hidden' name='id' value='".$_GET['id']."'>";


		?>
		<button class="button1">Submit</button>
	</form>
<div>
</body>
</html>
