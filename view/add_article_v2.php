<!DOCTYPE html>
<html>
<head>
	<title>Add Article</title>
</head>
<body>
	<form action='../controller/home_controller.php' method='GET'>
		<button>Back</button>
	</form>

	<form id="add">
		<form action="../controller/add.php" >
			
		    <label class="form_col" for="description">Description : </label>
    		<input name="description" id="description" type="text" value=""/>
    		<span class="tooltip">You must fill this field.</span>
    		<br><br>

    		<label class="form_col" for="name">Specie : </label>
    		<select name="name" id="name">
    			<option value="">Not a animal</option>
    			<?php
    				require_once("../controller/db_connexion.php");
    				$sql = 'select name from specie';
    				$req = $db_connexion->query($sql);
    				$i = 0;
    				while ($recup = $req->fetch()) {
    					$data[$i]= $recup;
    					$i++;
    				}
    				for ($i=0; $i < count($data); $i++) { 
    					echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
    				}
    			?>
    		</select>
    		<br><br>

    		<label class="form_col" for="unit_price">Price : </label>
    		<input name="unit_price" id="unit_price" type="text" value=""/> In dollars
    		<span class="tooltip">You must fill this field!</span>
    		<br><br>

    		<label class="form_col" for="stock">Number of product : </label>
    		<input name="stock" id="stock" type="text" value=""/>
    		<span class="tooltip">This field can't be equal to 0!</span>
    		<br><br>

    		<label class="form_col" for="gender"> Gender : </label> 
    		<select name='gender' id="gender">
				<option value='0'>Male</option>
				<option value='1'>Female</option>	
				<option value='2'>Hermaphrodite</option>
			</select>
			<br><br>

			<label class="form_col" for="diet"> Food : </label> 
    		<select name='diet' id="diet">
				<option value='carnivorous'>Carnivorous</option>
				<option value='vegie'>Herbivorous</option>	
				<option value='omnivorous'>Omnivorous</option>
			</select>
			<br><br>

    		<label class="form_col" for="weight">Weight : </label>
    		<input name="weight" id="weight" type="text" value=""/> In kilograms
    		<br><br>

    		<label class="form_col" for="size">Size : </label>
    		<input name="size" id="size" type="text" value=""/> In meters
    		<span class="tooltip">You must fill this field!</span>
    		<br><br>

    		<label class="form_col" for="color">Color : </label>
    		<input name="color" id="color" type="text" value=""/>
    		<span class="tooltip">You must fill this field!</span>
    		<br><br>

    		<label class="form_col" for="age">Age : </label>
    		<input name="age" id="age" type="text" value=""/> In years 
    		<br><br>

    		<span class="form_col"></span>
    		<input type="submit" value="Submit" />

		</form>
	</form>
</body>
</html>