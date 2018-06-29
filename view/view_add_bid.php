	<center><h2>Please inform information about the product you want to sell</h2></center>
	<div id="box2"><br>
	<?php
		if (isset($test) && $test==1) {
			echo "Please be sure you have completed all field, and that your stock value is not 0.<br><br>";
		} elseif (isset($test) && $test==0) {
			echo "Your article has been added.<br><br>";
		}
	?>

		<form action="../controller/add_article_display.php?go=add" method="POST">
				Description : <br><input type='text' name='description' id="description"  pattern="[a-zA-Z0-9]{3,}+" title="Your article name must contain 3 characters. Special characters are not accepted." class="" value=''><br>

				<br>Specie :<?php
				if (!isset($test) || $test!==2) {
					echo "<select name='name' id='name'>";
					//AFFICHAGE DES DIFFERENTES ESPECES
					for ($i=0; $i < count($data) ; $i++) {
						echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
					}
				}else{
					echo "<input type='text' name='name' id='name'>";
				}
					?>

					</select><br>
				The specie you want to add doesn't exist ?  <a href="../controller/add_article_display.php?go=add_specie"> Add one</a><br>
				<br>
				Start price in dollars:<br><input type='text' name='price' id="price" pattern="[0-9]{1,}+" title="Special characters are not accepted." value=''><br>
				Number of products :<br><input type='text' name='stock' id="stock" pattern="[0-9]{1,}+" title="Special characters are not accepted." value=''>
				<span class="tooltip">This field can't be equal to 0 !</span><br><br>

				Gender : <select name='gender' id="gender">
					<option value='0'>Male</option>
					<option value='1'>Female</option>
					<option value='2'>Hermaphrodite</option>
				</select><br>

				Food : <select name='diet' id="diet">
					<option value='carnivorous'>Carnivorous</option>
					<option value='vegie'>Herbivorous</option>
					<option value='omnivorous'>Omnivorous</option>
				</select><br><br>

				Weight in kilograms: <br><input type='text' name='weight' id="weight" value=''><br>

				Size in meters:<br> <input type='text' name='size' id="size"  pattern="[0-9]{1,}+" title="Special characters are not accepted." value=''> <br>

				Color : <br><input type='text' name='color' id="color"  pattern="[a-zA-Z0-9]{3,}+" title="Your article color must contain at enter 3 and 12 characters. Special characters are not accepted." value=''><br>

				Age : <br><input type='text' name='age' id="age" value=''><br><br>

			  End date : <br><input type='date' name='date' value=''><br>
			<button class="button1">Submit</button>
		</form><br>
	</div>
</body>
</html>
