<?php
  if(isset($_POST["go"])){
    $whereami = ": ".$_POST["go"];
    if ($_POST["go"] == "subscribe" || $_GET["go"] == "subscribe"){
      $style = "<link rel='stylesheet' type='text/css' href='view/subscribe_style.css'>";
    } else {
      $style = "<link rel='stylesheet' type='text/css' href='view/style.css'>";
    }
  }elseif(isset($_GET["go"])){
    $style = "<link rel='stylesheet' type='text/css' href='view/subscribe_style.css'>";
    $whereami = ": ".$_GET["go"];
  } else {
    $wherami = "." ;
    $style = "<link rel='stylesheet' type='text/css' href='view/style.css'>";
  }
  echo "<!DOCTYPE html>
  <html>
  	<head>
      ".$style."
  		<title>TerraBay ".$whereami."</title>
  	</head>
  	<body>
  		<center><h1> Welcome on TerraBay</h1></center>";

?>
