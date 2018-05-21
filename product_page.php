<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
	$id = $_GET["id"];
?>



<!DOCTYPE html>
<html>
<head>
	<title>a</title>
</head>
<body>
	<?php
		require_once("./fonctions/display_products_detail.php");
	?>
</body>
</html>