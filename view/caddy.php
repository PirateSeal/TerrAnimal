<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		caddy
	</title>
</head>
<body>
	<?php

		echo "<form action='home.php' method='GET'>
		<button>back</button></form>";

		require_once("../controller/display_caddy.php");
	?>
</body>
</html>
