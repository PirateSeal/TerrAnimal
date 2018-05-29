<?php
  if(isset($_POST["go"]) || isset($_GET['go'])){
    //$whereami = ": ".$_POST["go"];
    //|| $_GET["go"] == "subscribe"
    if ($_POST["go"] == "subscribe"  ){
      $style = "<link rel='stylesheet' type='text/css' href='view/subscribe_style.css'>";
    }elseif (isset($_GET["go"]) && $_GET['go'] == "subscribe" ) {
      $style = "<link rel='stylesheet' type='text/css' href='view/subscribe_style.css'>";
    }else {
      $style = "<link rel='stylesheet' type='text/css' href='view/style.css'>";
    }
  }elseif(isset($_GET["go"])){
    $style = "<link rel='stylesheet' type='text/css' href='view/subscribe_style.css'>";
    //$whereami = ": ".$_GET["go"];
  } else {
    //$wherami = "index" ;
    $style = "<link rel='stylesheet' type='text/css' href='view/style.css'>";
  }
  echo "<!DOCTYPE html>
  <html>
  	<head>
      ".$style."
  		<title>TerraBay </title>
  	</head>
  	<body>
  		<center><h1> Welcome on TerraBay</h1></center>";

?>
