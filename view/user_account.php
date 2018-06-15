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
		<tr><td>Pseudo : ".$data['pseudo']."</td> <td>Name : ".$data['firstname']." ".$data['name']."</td></tr>
		<tr><td>Mail : ".$data['email']."</td> <td></td></tr>
		<tr><td>Note : ".$data['note']."</td> <td></td></tr>
		</table>";
	?>
</body>
</html>