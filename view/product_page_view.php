<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>product details</title>
</head>
<body>
	<?php
		echo "<form action='../controller/home_controller.php'><button>back</button></form>";

		echo "<form action='../controller/caddy_controller.php'><button>caddy</button></form>";


		echo "<br><table border=1px>
		<tr><td>image</td><td>".$data['specie']."</td></tr>
		<tr><td>".$data['unit_price']."$ </td><td>Stock :".$data['stock']."</td></tr>
		<tr><td>Age :".$data['age']."</td><td>".$data['diet']."</td></tr>
		<tr><td>Weight :".$data['weight']."</td><td>Color :".$data['color']."</td></tr>
		<tr><td>Vendor :".$data['firstname']." ".$data['name']."</tr></td>
		</table>";

		if ($status == 0) {
			echo "<form action='../model/add_caddy.php?id=".$_GET["id"]."' method='POST'><button>Add to caddy</button></form>"; 
		}
		
	?>

</body>
</html>
