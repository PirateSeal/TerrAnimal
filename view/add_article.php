
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

		<form action="../model/add_article.php" method="GET">
			Description : <input type='text' name='description' id="description" class="" value=''>
			<span class="tooltip">You must fill this field !</span><br><br>

			Specie : <select name='name' id="name">
				<?php	
				require_once("../controller/db_connexion.php");
				$sql = "select name from species";
				$req = mysqli_query($db_connexion, $sql);
				$i=0;
				while ($recup = mysqli_fetch_array($req, MYSQLI_NUM)){
					$data[$i]= $recup;
					$i++;
				}
				for ($i=0; $i < count($data) ; $i++) { 
					echo "<option value='".$data[$i][0]."'>".$data[$i][0]."</option>";
				} 
				?>
							
				</select><br><br>

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
				<option value='Carnivorous'>Carnivorous</option>
				<option value='Herbivorous'>Herbivorous</option>
				<option value='Omnivorous'>Omnivorous</option>
			</select><br><br>

			>Weight : <input type='text' name='weight' id="weight" value=''> In kilograms<br><br>

			Size : <input type='text' name='size' id="size" value=''> In meters
			<span class="tooltip">You must fill this field !</span><br><br>

			Color : <input type='text' name='color' id="color" value=''>
			<span class="tooltip">You must fill this field !</span><br><br>

			Age : <input type='text' name='age' id="age" value=''><br><br>
			
			<button>Submit</button>
		</form>


<?php
	if (isset($_GET["error"])){
		if ($_GET["error"] == "incomplete"){
			echo "<h4>Please complete all fields .</h4>";
		}
	} else if (isset($_GET["validation"]) && $_GET["validation"] == "confirmed") {
		echo "Your add has been confirmed .<br>You will be redirected in 3 seconds<br>";
			header("Refresh:3;Url=home_view.php");
	}
?>

<script type="text/javascript" src="controller/add_article.js"></script>

</body>
</html>
