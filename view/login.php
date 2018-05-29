<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='view/style.css'>
		<title>TerraBay </title>
	</head>
	<body>
    <form action="../index.php" method="POST">
      <button>Back</button>
    </form>
    <h2>Login Field</h2>
    <form action="login.php" method="POST">
      <label for="pseudo">Username : </label><input type="text" size="30px"name="pseudo" value=""><br>
      <label for="password">Password : </label><input type="password" size="30px"name="password" value=""><br>
      <?php if (isset ($_GET["error"])){echo "Your username or password is wrong .<br>";}else{echo"<br>";} ?>
      <button>Submit</button>
    </form>
  </body>
</html>
