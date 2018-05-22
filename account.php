<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}

		if ( $_GET["setting"] === "go"){
			echo "<form action='account.php' method='GET'>"
			echo "Pseudo :".$data["pseudo"]."<br>";
			echo "Firstname".$data["firstname"]."<br>";
			echo "Name :".$data["name"]."<br>";
			echo "Note :".$data["note"]."<br>";
		} else {
			echo "<!DOCTYPE html><html><head><title>Account</title></head><body>";
			echo "<form action='home.php' method='GET'>
							<button>Back</button>
						</form>";
			require_once("fonctions/db_connexion.php");
			$req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
			if ( mysqli_num_rows($req) == 1){
				$data = mysqli_fetch_array($req);
				echo "Pseudo :".$data["pseudo"]."<br>";
				echo "Firstname".$data["firstname"]."<br>";
				echo "Name :".$data["name"]."<br>";
				echo "Note :".$data["note"]."<br>";
			}
		echo "<form action='account.php' method='GET'>
						<button name='setting' value='go'>Settings</button>
					</form>";
		}

?>
</body>
</html>
