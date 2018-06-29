<?php
ini_set('display_errors','on');
error_reporting(E_ALL|E_STRICT);

	if ( !isset($_POST["pseudo"]) && !isset($_POST["email"]) && !isset($_POST["firstname"]) && !isset($_POST["name"]) && !isset($_POST["password"]) ){

	} else {
		header("refresh:0");
	}
?>
<?php
	require_once("../controller/db_connexion.php");
	$data = $db_connexion->query("SELECT * FROM users WHERE pseudo='".$_SESSION["pseudo"]."'")->fetch();
?>
<center><h2>Account Settings</h2></center>
<div id="box1"><br>
<form action='../controller/account_settings.php' method='POST'>
	<label for='pseudo'> Your pseudo : </label><input type='text' size='25' name='pseudo' value= <?php echo $data["pseudo"] ?>>
	<button class="button2">Change your pseudo</button><br>
</form>
<form action='../controller/account_settings.php' method='POST'>
							<label for='email'> Email : </label><input type='text' size='25' name='email' value= <?php echo $data["email"] ?>>
							<button class="button1">Change your email</button><br>
						</form>
						<form action='../controller/account_settings.php' method='POST'>
							<label for='firstname'> Firstname : </label><input type='text' size='25' name='firstname' value=<?php echo $data["firstname"]?>>
							<button class="button1">Change your firstname</button><br>
						</form>
						<form action='../controller/account_settings.php' method='POST'>
							<label for='name'>      Name : </label><input type='text' size='25' name='name' value=<?php echo $data["name"] ?>>
							<button class="button1">Change your name</button><br>
						</form><br>
						<form action='../controller/account_settings.php' method='POST'>
							Old Password : <br><input type='password' size='25' name='password' value=''><br>
							Password : <br><input type='password' size='25' name='password1' value=''><br>
							Re-enter password : <br><input type='password' size='25' name='password2' value=''><br>
							<button class="button2">Change your password</button><br>
						</form><br>
						<form action='../controller/account_settings.php' method='POST'>
							<button class="button2" name='account' value='delete'> Delete your account</button>
						</form>
			<?php
			if (isset( $_GET["error"])){
				if ( $_GET["error"] == "pseudo_exist"){
					echo"<h6>This pseudo is already taken </h6>";
				} elseif ( $_GET["error"] == "password_not_set"){
					echo"<h6>You need to enter the old password and 2 times the new one .</h6>";
				} elseif ( $_GET["error"] == "bad_password"){
					echo"<h6>Passwords does not match .</h6>";
				} elseif ( $_GET["error"] == "wrong_password"){
					echo"<h6>Your old password is wrong .</h6>";
				}
			}
		?><br>
	</div>
	</body>
</html>
