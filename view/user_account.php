<!DOCTYPE html>
<html>
<head>
	<title>User Page</title>
</head>
<body>
	<?php
		echo "<table>
		<tr><td>Vendor Image</td><td></td></tr>
		<tr><td>Pseudo : ".$data['pseudo']."</td> <td>Name : ".$data['firstname']." ".$data['name']."</td></tr>
		<tr><td>Mail : ".$data['email']."</td> <td></td></tr>
		<tr><td>Note : ".$data['note']."/5</td><td>";
		if (isset($_GET['id_transa'])) {
		 	echo "<form action='../controller/user_account.php?vote=oui' method='POST'>
		 	<input id='note' type='number' name='note' step='0.5' min='0' max='5' value=''>
		 	<input id='id_transa' name='id_transa' type='hidden' value='".$_GET['id_transa']."'>
		 	<button>Vote</button></form>";
		 }
		 echo "</td></tr>
		</table>";
	?>
</body>
</html>
