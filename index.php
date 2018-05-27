	<?php
		if (!isset($_POST["go"])){
			// INDEX
			include("controller/header_generator.php");
			include("view/body_index.php");
			require_once("controller/display_products.php");
			include("view/footer_index.php");
		}elseif ($_POST["go"] == "login"){
			// LOGIN
			include("controller/header_generator.php");
			include("view/body_login.php");
			include("view/footer_index.php");
		}elseif ($_POST["go"] == "subscribe"){
			// SUBSCRIBE
			include("controller/header_generator.php");
			include("view/body_subscribe.php");
			include("view/footer_index.php");
		}
	?>
