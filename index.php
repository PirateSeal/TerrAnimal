	<?php
	if (isset($_GET["subscribe"]) && $_GET["subscribe"] == "confirmed"){
		echo "<script>alert('Your account has been created !')</script>";
	}
		if (!isset($_POST["go"]) && !isset($_GET["go"]) ){
			// INDEX
			include("controller/header_generator.php");
			include("view/body_index.php");
			include("view/footer_index.php");
		}elseif ($_POST["go"] == "login"){
			// LOGIN
			include("controller/header_generator.php");
			include("view/body_login.php");
			include("view/footer_index.php");
		}elseif ($_POST["go"] == "subscribe" || $_GET["go"] == "subscribe"){
			// SUBSCRIBE
			include("controller/header_generator.php");
			include("view/body_subscribe.php");
			include("view/footer_index.php");
		}
?>
