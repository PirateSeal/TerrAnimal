
<!DOCTYPE html>
<html>
<head>
	<title>add_article</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="add_article_style.css">
</head>
<body>
	<form action='../controller/home_controller.php' method='GET'><button>Back</button></form>
	<br>
	<h1>Please inform information about the product you want to sell</h1>
	<br>
	<?php
		if (isset($test) && $test==1) {
			echo "Please be sure you have completed all field, and that your stock value is not 0.<br><br>";
		} elseif (isset($test) && $test==0) {
			echo "Your article has been added.<br><br>";
		}
	?>

		<form action="../controller/add_article_display.php?go=add" method="POST">
				Description : <input type='text' name='description' id="description" class="" value=''>
				<span class="tooltip">You must fill this field !</span><br><br>

				Specie :<?php 
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
				The specie you want to add doesn't exist ?  <a href="../controller/add_article_display.php?go=add_specie"> Add one</a>
				<br>
				Price : <input type='text' name='price' id="price" value=''> In dollars
				<span class="tooltip">You must fill this field !</span><br><br>

				Number of products : <input type='text' name='stock' id="stock" value=''>
				<span class="tooltip">This field can't be equal to 0 !</span><br><br>

				Gender : <select name='gender' id="gender">
					<option value='0'>Male</option>
					<option value='1'>Female</option>
					<option value='2'>Hermaphrodite</option>
				</select><br><br>

				Food : <select name='diet' id="diet">
					<option value='carnivorous'>Carnivorous</option>
					<option value='vegie'>Herbivorous</option>
					<option value='omnivorous'>Omnivorous</option>
				</select><br><br>

				Weight : <input type='text' name='weight' id="weight" value=''> In kilograms<br><br>

				Size : <input type='text' name='size' id="size" value=''> In meters
				<span class="tooltip">You must fill this field !</span><br><br>

				Color : <input type='text' name='color' id="color" value=''>
				<span class="tooltip">You must fill this field !</span><br><br>

				Age : <input type='text' name='age' id="age" value=''><br><br>
			<button>Submit</button>
		</form>

</body>
</html>
