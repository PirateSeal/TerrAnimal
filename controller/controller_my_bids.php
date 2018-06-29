<?php
  require("../controller/loged_or_not.php");
  require("../controller/db_connexion.php");
  require("../view/header.php");
  $req_user =" SELECT * FROM articles WHERE status='bid' AND id_user='".$_SESSION["ID"]."'";
  $data = $db_connexion->query($req_user)->fetchAll();

  echo "<div id='box'><br>";

  for ($i=0; $i < count($data) ; $i++) {
      $req_bid =" SELECT * FROM bids WHERE id_article='".$data[$i][0]."'";
      $bid = $db_connexion->query($req_bid)->fetch();

      $req_specie = "select name from species where id_specie='".$data[$i][1]."'";
      $specie = $db_connexion->query($req_specie)->fetch();

      echo "Description : ".$data[$i][3]."<br>";
      echo "<img src=".$data[$i][13] ."><br>";
      echo "ID_specie : ".$specie[0]."<br>";
      echo "Unit_price : ".$data[$i][4] ."<br>";
      echo "Lot of : ".$data[$i][5] ."<br>";
      echo "Genre: ".$data[$i][6] ."<br>";
      echo "Diet: ".$data[$i][7] ."<br>";
      echo "weight: ".$data[$i][8] ."<br>";
      echo "size: ".$data[$i][9] ."<br>";
      echo "Color: ".$data[$i][10] ."<br>";
      echo "Age: ".$data[$i][11] ."<br>";
      echo "Initial price :".$bid[5]."<br>";
      echo "End price :".$bid[6]."<br>";
      echo "Date start :".$bid[3]."<br>";
      echo "Date end :".$bid[4]."<br><br>";

  }
  echo "<br><br><br></div>";

?>
