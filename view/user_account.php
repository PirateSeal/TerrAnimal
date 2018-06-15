<!DOCTYPE html>
<html>
<head>
	<title>User Page</title>
</head>
<body>
	<form action='../controller/home_controller.php'><button>back</button></form><br>

	<?php
		echo "<table>
		<tr><td>Vendor Image</td><td></td></tr>
		<tr><td>".$data['pseudo']."</td> <td>".$data['firstname']." ".$data['name']."</td></tr>
		<tr><td>".$data['email']."</td> <td></td></tr>
		<tr><td>".$data['note']."</td> <td></td></tr>
		</table>";
	?>
</body>
</html>