<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		caddy
	</title>
</head>
<body>
	<?php

		echo "<form action='../controller/home_controller.php' method='GET'>
		<button>back</button></form>";
		if (isset($_COOKIE['toto'])) {
			for ($i=0; $i < count($recup); $i++) {
				echo "<table border=1px>
				<tr>
					<td><a href='../controller/product_page_controller.php?id=".$recup[$i]['id_article']."'>".$recup[$i]['name']."</a></td>
					<td>".$recup[$i]['unit_price']." $</td>
					<td><form action='../model/delete_caddy_article.php?id=".$i." method='GET'><button>supprimer</button></form></td>
				</tr>
				<br>";
			}
			echo "<form action='../controller/confirm_order_controller.php'><button>Confirm order</button> ";
		}else {
			echo "You don't have any articles in your caddy.";
		}
		
	?>

</body>
</html>