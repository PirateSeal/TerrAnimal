<!DOCTYPE html>
<html>
<head>
	<title>Your article</title>
</head>
<body>
	<?php
	echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";
	?>
		<form action='../controller/home_controller.php' method='GET'><button>Back</button></form>
	</form>	
			<?php 
			if (empty($req)) {
				echo "You don't had any article !";
			} else {
				if (isset($data)) {
					for ($i=0; $i <count($data) ; $i++) {
						echo"<br><table border = 1px><tr><td>image</td></tr>
						<tr><td>".$data[$i]['name']."</td></tr>
						<tr><td>Price :".$data[$i]['unit_price']." $</td></tr>
						<tr><td><form action='../controller/modify_article.php?id=".$data[$i]['id_article']."' method='POST'>
						<button> Modify </button></form></td></tr>
						<tr><td><form action='../controller/delete_article.php?id=".$data[$i]['id_article']."' method='POST'>
						<button> Delete </button></form></td></tr></table><br>";
						var_dump($data);
					}
				}
			}?>
</body>
</html>