<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}


// ne pas mettre des trucs incomplets pls si vous faites une fonctionnalité
// assurez vous qu'elle marche un minimum
/*
	if ( $_GET["action"] === "disconnect"){
		echo "banana";
	}
*/
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
		echo "<form action='fonctions/disconnect.php' method='GET'>
		<button>disconnect</button></form>";

		echo "<form action='./caddy.php'><button>caddy</button></form>";
		echo "<form action='account.php' method='GET'>
		<button>account</button></form>";


		require_once("./fonctions/display_products.php");
	?>
</body>
</html>
