<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../view/style.css'>
		<title>TerraBay </title>
	</head>
	<body>

    <form action="../index.php" method="POST">
      <button class="button button2" >Back</button>
    </form>

		<center><h2>Login Field</h2></center>
		<div id="box1">
			<br><br>
		<form action="login.php" method="POST">
      <label for="pseudo">Username : </label><input type="text" size="20px"name="pseudo" value=""><br>
      <label for="password">Password : </label><input type="password" size="20px"name="password" value=""><br>
      <?php if (isset ($_GET["error"])){echo "Your username or password is wrong .<br>";}else{echo"<br>";} ?>
      <button class="button button1">Submit</button>
    </form>
		<br><br>
	</div>
  </body>
</html>
