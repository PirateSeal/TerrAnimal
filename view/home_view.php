
<!DOCTYPE html>
<html>
<head>
	<title>TerraBay</title>
</head>
<body>
	<?php
		echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";

		echo "You have ".$user_data['balance']."$ on your account <br>";
		if (isset($data)) {
			for ($i=0; $i <count($data) ; $i++) {
				echo "<br><table border = 1px width='20%'><tr><td><img src = '".$data[$i]['photo_path']."'></td></tr>
				<tr><td>".$data[$i]['name']."</td></tr>
				<tr><td>Price :".$data[$i]['unit_price']." $</td></tr>
				<tr><td><form action='../controller/product_page_controller.php?id=".$data[$i]['id_article']."' method='POST'>
				<input type='submit' name='Details' value='Details'></form></td></tr></table><br>";
			}
		}


	?>
</body>
</html>
