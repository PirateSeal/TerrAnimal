<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../view/style.css">
		<link rel='stylesheet' type='text/css' href='../view/subscribe_style.css'>
		<title>TerraBay</title>
	</head>
	<body>
		<form action="../index.php" method="GET"><button class="button2">Back</button></form>
		<center><h2>Subscription Field</h2></center>
		<div id="box2">
		<form id="subscribe"><br><br>
	  	<form action="subscribe.php" method="POST">
	    	<label class="form_col" for="pseudo">Pseudo : </label>
	    	<input name="pseudo" id="pseudo" pattern="[a-zA-Z0-9]+" title="Special characters are forbidden." type="text" value="<?php if(isset($_GET["go"])){echo "This account already exist ";}?>">
	    	<span class="tooltip">Your pseudo must contain at enter 3 and 12 characters . Special characters are not accepted .</span>
	    	<br><br>


	    	<label class="form_col" for="firstname">Firstname : </label>
	    	<input name="firstname" id="firstname" type="text">
	    	<span class="tooltip">Your firstname must contain at enter 3 and 12 characters . Special characters are not accepted .</span>
	    	<br><br>

	    	<label class="form_col" for="lastname">Name : </label>
	    	<input name="lastname" id="lastname"  type="text" >
	    	<span class="tooltip">Your lastname must contain at enter 3 and 12 characters . Special characters are not accepted .</span>
	    	<br><br>

	    	<label class="form_col" for="mail">Email : </label>
	    	<input name="mail" id="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a your email." type="text" />
	    	<span class="tooltip">Your email must contain at enter 3 and 12 characters . Special characters are not accepted .</span>
	    	<br><br>


	    	<label class="form_col" for="password1">Password : </label>
	    	<input name="password1" id="password1" pattern="[a-zA-Z0-9]+" title="Special characters are forbidden." type="password" >
	    	<span class="tooltip">Your password must contain at enter 3 and 12 characters . Special characters are not accepted .</span>
	    	<br><br>

	    	<label class="form_col" for="password2">Password (confirmation) : </label>
	    	<input name="password2" id="password2" pattern="[a-zA-Z0-9]+" title="Special characters are forbidden." type="password" >
	    	<span class="tooltip">The confirmation password must be identical to the original one . Special characters are not accepted .</span>
	    	<br><br>

	    	<span class="form_col"></span>
				<div class="btn-group">
  				<button class="button1" value="submit">Submit</button>
  				<button class="button2" value="reset">Reset</button>
				</div>

	    	<?php
	      	if (isset($_GET["subscribe"]) && $_GET["subscribe"] == "confirmed"){
	        	echo "<br>Your registration has been registered .<br>You will be redirected in 3 seconds<br>";
	        	header("Refresh:3;Url=../index.php");
	      	}
	    	?>
	  	</form>
		</form><br>
	</div>
		<script type="text/javascript" src="subscribe.js"></script>
	</body>
</html>
