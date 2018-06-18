
<!DOCTYPE html>
<html>
<head>
	<title>TerraBay</title>
</head>
<body>
	<?php
		echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";
		if (isset($_SESSION['admin'])) {
			echo '<a href="../controller/backoffice_controller.php"><button>Goto BO</button></a>';
		}
		echo "<form action='home_controller.php' method='POST'><button>Home</button></form>";
		echo "<form action='../controller/disconnect.php' method='GET'>
		<button>disconnect</button></form>";

		echo "<form action='../controller/caddy_controller.php'><button>caddy</button></form>";
		echo "<form action='../controller/account_controller.php' method='GET'>
		<button>account</button></form>";
		require_once("searchbar_view.php");

		echo "<form action='../controller/add_article_display.php'><button>Add an article</button></form>";

		echo "<form action='../controller/my_article.php'><button>Modify your article</button></form>";
		echo "<form action='../controller/offer_of_the_hour_controller.php'><button>Offer of the hour</button></form>";
		echo "You have ".$user_data['balance']."$ on your account";
		if (isset($data)) {
			for ($i=0; $i <count($data) ; $i++) {
				echo "<br><table border = 1px><tr><td>image</td></tr>
				<tr><td>".$data[$i]['name']."</td></tr>
				<tr><td>Price :".$data[$i]['unit_price']." $</td></tr>
				<tr><td><form action='../controller/product_page_controller.php?id=".$data[$i]['id_article']."' method='POST'>
				<input type='submit' name='Details' value='Details'></form></td></tr></table><br>";
			}
		}


	?>
</body>
</html>
