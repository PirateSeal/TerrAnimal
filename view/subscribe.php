<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../view/subscribe_style.css'>
		<title>TerraBay : Subscription</title>
	</head>
	<body>
		<form action="../index.php" method="GET">
	  	<button>Back</button>
		</form>
			<!-- <3<3<3 -->
		<form id="subscribe"><br><br>
	  	<form action="subscribe.php" method="POST">
	    	<label class="form_col" for="pseudo">Pseudo : </label>
	    	<input name="pseudo" id="pseudo" type="text" value="<?php if(isset($_GET["go"])){echo "This account already exist ";}?>"/>
	    	<span class="tooltip">Your pseudo must contain at least 3 characters .</span>
	    	<br><br>


	    	<label class="form_col" for="firstname">Firstname : </label>
	    	<input name="firstname" id="firstname" type="text" />
	    	<span class="tooltip">Your firstname must contain at least 2 characters .</span>
	    	<br><br>

	    	<label class="form_col" for="lastname">Name : </label>
	    	<input name="lastname" id="lastname" type="text" />
	    	<span class="tooltip">Your name must contain at least 2 characters .</span>
	    	<br><br>

	    	<label class="form_col" for="mail">Email : </label>
	    	<input name="mail" id="mail" type="text" />
	    	<span class="tooltip">Your email must contain at least 2 characters .</span>
	    	<br><br>


	    	<label class="form_col" for="password1">Password : </label>
	    	<input name="password1" id="password1" type="password" />
	    	<span class="tooltip">Your name must contain at least 3 characters .</span>
	    	<br><br>

	    	<label class="form_col" for="password2">Password (confirmation) : </label>
	    	<input name="password2" id="password2" type="password" />
	    	<span class="tooltip">The confirmation password must be identical to the original one</span>
	    	<br><br>

	    	<span class="form_col"></span>
	    	<input type="submit" value="Submit" /> <input type="reset" value="Reset" />
	    	<?php
	      	if (isset($_GET["subscribe"]) && $_GET["subscribe"] == "confirmed"){
	        	echo "<br>Your registration has been registered .<br>You will be redirected in 3 seconds<br>";
	        	header("Refresh:3;Url=../index.php");
	      	}
	    	?>
	  	</form>
		</form>
		<script type="text/javascript" src="subscribe.js"></script>
	</body>
</html>
