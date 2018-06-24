<?php
	echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";
?>

<div id="box3">

<?php
	if (isset($data)) {
		$x=0;
		for ($i=0; $i <count($data) ; $i++) {
			echo "<center><div class='col-sm-3' style='background-color:white; opacity:0.7; color:red; border:solid black 2px ;overflow: hidden;max-width: 336px; '><br>
			<img class='float-left mr-5' src = '".$data[$i]['photo_path']."' width='25%'>
			<br>".$data[$i]['name']."<br>".$data[$i]['unit_price']." $<br>
			<form action='../controller/modify_article.php?id=".$data[$i]['id_article']."' method='POST'>
			<input type='submit' class='btn btn-dark' style='background-color:dark;'  value='Modify'></form>
			<form action='../controller/delete_article.php?id=".$data[$i]['id_article']."' method='POST'>
			<input type='submit' class='btn btn-danger' style='background-color:dark;' value='Delete'></form><br>
			</div></center>";
			$x++;
			if ( $x === 3 ){
				echo "<br>";
			}
		}
	} else {
		echo "<br>You don't had any article !<br>Click <a href='../controller/add_article_display.php'>here</a> to add one .<br><br>";
	}
?>
</div>
</body>
</html>
