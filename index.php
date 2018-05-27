	<?php
		if (!isset($_POST["go"])){
			// INDEX
			include("view/header_index.php");
			include("view/body_index.php");
			require_once("../controller/display_products.php");
			include("view/footer_index.php");
		}elseif ($_POST["go"] == "login"){
			// LOGIN
			include("view/header_login.php");
			include("view/body_login.php");
			include("view/footer_index.php");
		}elseif ($_POST["go"] == "subscribe"){
			// SUBSCRIBE
			include("view/header_subscribe.php");
			include("view/body_subscribe.php");
			include("view/footer_index.php");
		}
	?>
