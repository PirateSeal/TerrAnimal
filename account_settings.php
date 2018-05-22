<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}
?>
  <!DOCTYPE html>
  <html>
  	<head>
  		<title>TerraBay Account</title>
      <link rel="stylesheet" type="text/css" href="style.css" />
  	</head>
  	<body>
  		<form action='home.php' method='GET'>
  			<button>Back</button></form>
  		</form>

      <?php
      require_once("fonctions/db_connexion.php");
	    $req = mysqli_query($db_connexion, "SELECT * FROM users WHERE pseudo = '".$_SESSION["pseudo"]."'");
	    $data = mysqli_fetch_array($req);

	    echo" <form action='fonctions/account_settings.php' method='POST'>
    		      <label for='pseudo'>    Your pseudo : </label><input type='text' size='25' name='pseudo' value='".$data["pseudo"]."'>
              <button>Change your pseudo</button><br>
            </form>
            <form action='fonctions/account_settings.php' method='POST'>
    		      <label for='firstname'> Firstname : </label><input type='text' size='25' name='firstname' value='".$data["firstname"]."'>
              <button>Change your firstname</button><br>
              </form>
              <form action='fonctions/account_settings.php' method='POST'>
              <label for='name'>      Name : </label><input type='text' size='25' name='name' value='".$data["name"]."'>
              <button>Change your name</button><br>
            </form><br>
            <form action='fonctions/account_settings.php' method='POST'>
              <label for='password'> Old Password : </label><input type='password' size='25' name='password' value=''><br>
    		      <label for='password1'> Password : </label><input type='password' size='25' name='password1' value=''><br>
    		      <label for='password2'> Re-enter password : </label><input type='password' size='25' name='password2' value=''><br>
              <button>Change your password</button><br>
            </form>";
						if ( $_GET["error"] == "pseudo_exist"){
								echo"<h6>This pseudo is already taken </h6>";
						} elseif ( $_GET["error"] == "password_not_set"){
								echo"<h6>You need to enter the old password and 2 times the new one .</h6>";
						} elseif ( $_GET["error"] == "bad_password"){
								echo"<h6>Passwords does not match .</h6>";
						} elseif ( $_GET["error"] == "wrong_password"){
								echo"<h6>Your old password is wrong .</h6>";
						}
      ?>
    </body>
  </html>
