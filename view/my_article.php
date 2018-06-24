<?php
	echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";
?>

<div id="box2">

<?php
	if (isset($data)) {
		echo "<br>";
		for ($i=0; $i <count($data) ; $i++) {
			echo"<br><table border = 1px><tr><td>image</td></tr>
			<tr><td>".$data[$i]['name']."</td></tr>
			<tr><td>Price :".$data[$i]['unit_price']." $</td></tr>
			<tr><td><form action='../controller/modify_article.php?id=".$data[$i]['id_article']."' method='POST'>
			<button> Modify </button></form></td></tr>
			<tr><td><form action='../controller/delete_article.php?id=".$data[$i]['id_article']."' method='POST'>
			<button> Delete </button></form></td></tr></table><br>";
		}
		echo "<br>";
	} else {
		echo "<br>You don't had any article !<br>Click <a href='../controller/add_article_display.php'>here</a> to add one .<br><br>";
	}
?>
</div>
</body>
</html>
