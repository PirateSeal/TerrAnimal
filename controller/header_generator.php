<?php
  if(isset($_POST["go"])){
    $whereami = $_POST["go"];
    if ($_POST["go"] == "subscribe"){
      $style = "<link rel='stylesheet' type='text/css' href='view/subscribe_style.css'>";
    } else {
      $style = "<link rel='stylesheet' type='text/css' href='view/style.css'>";
    }
  } else {
    $wherami = index ;
  }
  echo "<!DOCTYPE html>
  <html>
  	<head>
      ".$style."
  		<title>TerraBay : ".$whereami."</title>
  	</head>
  	<body>
  		<center><h1> Welcome on TerraBay</h1></center>";

?>
