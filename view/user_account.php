	<?php
		echo "<center><h2>Ranking you seller .</h2></center>";
		echo "<div id='box2'><br><center>
		Seller pseudo : ".$data['pseudo']."<br>
		Firstname : ".$data['firstname']."<br>
		Name :".$data['name']."<br>
		Mail : ".$data['email']."
		Note : ".$data['note']."/5<br><br>";
		if (isset($_GET['id_transa'])) {
		 	echo "<div id='box3'><form action='../controller/user_account.php?vote=oui' method='POST'>
		 	<input id='note' type='number' name='note' step='0.5' min='0' max='5' value=''>
		 	<input id='id_transa' name='id_transa' type='hidden' value='".$_GET['id_transa']."'>
		 	<button>Vote</button></form></div><br>";
		 }
		 echo "</td></tr>
		</table></div></center>";
	?>
</body>
</html>
