<center><h2>Information of the article</h2></center>
<div id="box1">
	<?php
	$data1 = $db_connexion->query($req1)->fetch();
		echo "<br>
		<img class='' src = '".$data1[13]."' width='23%'><center>
		Specie :".$data['specie']."<br>Description :".$data1[3]."<br>Price :".$data['unit_price']."$ <br>Stock :".$data['stock']."<br>
		Age :".$data['age']."<br>Diet :".$data['diet']."<br>
		<br>Weight :".$data['weight']."<br>Color :".$data['color']."<br>
		<br>Vendor :<a href='../controller/user_account.php?id_user=".$data["id_user"]."'>".$data['firstname']." ".$data['name']."</a><br><br></center>
		";

		if ($status == 0) {
			if(isset($_GET["id"])) {
				echo "<script> alert('This animal has been added to your caddy .')</script>";
			}
			echo "<form action='../model/add_caddy.php?id=".$_GET["id"]."' method='POST'><button class='button1'>Add to caddy</button></form><br>";
		} else {
			echo "This animal has been added to your caddy .<br><br>";
		}
	?>
</div>
</body>
</html>
