<!DOCTYPE html>
<html>
<head>
	<title>TerraBay</title>
</head>
<body>
	<?php
		echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";
		echo "<form action='../controller/disconnect.php' method='GET'>
		<button>disconnect</button></form>";

		echo "<form action='../controller/caddy_controller.php'><button>caddy</button></form>";
		echo "<form action='../view/account.php' method='GET'>
		<button>account</button></form>";

		echo "<form action='../view/add_article.php'><button>Add an article</button></form>";

		for ($i=0; $i <count($data) ; $i++) {
			echo "<br><table border = 1px><tr><td>image</td></tr>
			<tr><td>".$data[$i]['name']."</td></tr>
			<tr><td>Price :".$data[$i]['unit_price']." $</td></tr>
			<tr><td><form action='../controller/product_page_controller.php?id=".$data[$i]['id_article']."' method='POST'>
			<input type='submit' name='Details' value='Details'></form></td></tr></table><br>";
		}

	?>
</body>
</html>
