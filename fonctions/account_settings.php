<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:index.php");
	}

  if (isset ($_POST["pseudo"])){
    echo "blyat";
  } elseif(isset ($_POST["firstname"])){
    echo "blyat1";
  } elseif(isset ($_POST["name"])){
    echo "blyat2";
  } elseif(isset ($_POST["password"])){
    echo "blyat3";
  }



?>
