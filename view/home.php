<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		home
	</title>
</head>
<body>
	<?php
		echo "<form action='../controller/disconnect.php' method='GET'>
		<button>disconnect</button></form>";

		echo "<form action='caddy.php'><button>caddy</button></form>";
		echo "<form action='account.php' method='GET'>
		<button>account</button></form>";

		echo "<form action='add_article.php'><button>Add an article</button></form>";


		require_once("../controller/display_products.php");
	?>
</body>
</html>
