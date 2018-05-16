<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
	echo "<form action='fonctions/disconnect.php' method='GET'>
					<button>disconnect</button></form>";

	if ( $_GET["action"] === "disconnect"){
		echo "banana";
	}
?>
