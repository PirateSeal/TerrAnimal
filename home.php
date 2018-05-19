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
		
	</title>
</head>
<body>
	<?php
		echo "<form action='fonctions/disconnect.php' method='GET'> 
		<button>disconnect</button></form>";
	?>
</body>
</html>
	

