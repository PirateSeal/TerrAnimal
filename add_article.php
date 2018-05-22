<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>add_article</title>
</head>
<body>
	<form action='home.php' method='GET'><button>Back</button></form>";
	<br>
	<h1>Please inform information about the product you want to sell</h1> 
	<br>
	<form action="./fonctions/add_article_db.php" method="GET">
		<?php
			require_once("./fonctions/add_article_display.php");
		?>
		<button>Submit</button>
	</form>
</body>
</html>