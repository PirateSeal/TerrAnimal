	<?php
		if (isset($_COOKIE['toto'])) {
			echo "<h2><center>Your order</h2></center><div id='box'>";
			for ($i=0; $i < count($recup); $i++) {
				echo "<center><table border=1px>
				<tr>
					<td><a href='../controller/product_page_controller.php?id=".$recup[$i]['id_article']."'>".$recup[$i]['name']."</a></td>
					<td>".$recup[$i]['unit_price']." $</td>
					<td><form action='../model/delete_caddy_article.php?id=".$i."' method='POST'><button class='button2'>supprimer</button></form></td>
				</tr>
				<br>";
			}
			echo "</table>";
			if ($order == 1) {
				echo "<br><form action='../controller/confirm_order_controller.php'><button class='button1'>Confirm order</button></form><br> ";
			}
		}else {
			echo "<h2><center>Your order</h2></center><div id='box'>";
			echo "<br><center>You don't have any articles in your caddy.";
		}
		echo "</center>";
	?>

</body>
</html>
