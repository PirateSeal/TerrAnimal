<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>add_article</title>
</head>
<body>
	<form action='home.php' method='GET'><button>Back</button></form>
	<br>
	<h1>Please inform information about the product you want to sell</h1>
	<br>
	<form action="../controller/add_article_db.php" method="GET">
		<?php
			require_once("../controller/add_article_display.php");
		?>
		<button>Submit</button>
	</form>

<?php
	if (isset($_GET["error"])){
		if ($_GET["error"] == "incomplete"){
			echo "<h4>Please complete all fields .</h4>";
		}
	} else if (isset($_GET["validation"]) && $_GET["validation"] == "confirmed") {
		echo "Your add has been confirmed .<br>You will be redirected in 3 seconds<br>";
			header("Refresh:3;Url=home.php");
	}
?>
</body>
</html>
