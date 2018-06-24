
	<?php
		echo "<center><h2>Welcome ".$_SESSION["pseudo"]."</h2></center>";
	?>
	<?php
	$x=0;

		if (isset($data)) {
			echo "<div class='row'>";
			for ($i=0; $i <count($data) ; $i++) {
				echo "<div class='col-sm-3' style='background-color:white; opacity:0.7; color:red; border:solid black 2px ;overflow: hidden;max-width: 336px; '><br>
				<img class='float-left mr-5' src = '".$data[$i]['photo_path']."' width='25%'>
				<br>".$data[$i]['name']."<br>".$data[$i]['unit_price']." $<br>
				<form action='../controller/product_page_controller.php?id=".$data[$i]['id_article']."' method='POST'>
				<input type='submit' class='btn btn-dark' style='background-color:dark;' name='Details' value='Details'></form><br><br></div>";
				$x++;
				if ( $x === 3 ){
					echo "<br>";
				}
			}

		}


	?>
</body>
</html>
