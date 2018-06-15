<?php
  require("../controller/db_connexion.php");
  require("../model/offer_of_the_hour_model.php ");
  $data = $db_connexion->query($req_bid)->fetch();
  // RÉCUPÉRATION DE MES VARIABLES

  $year = date("Y");
  $month = date("m");
  $day = date("d");
  $hour = date("H");
  $minute = date("i");
  $second = date("s");

  $h = $hour;
  $hh = $hour+1;
  $h1 =$year."-".$month."-".$day." ".$h.":00:00";
  $h2 =$year."-".$month."-".$day." ".$hh.":00:00";
  $time_start =$data[3];
  $time_end = $data[4];

  //HEURE DE DEPART
  $date_time_start = explode(" ", $time_start);
  $date_start = explode("-",$date_time_start[0]);
  $hour_start = explode(":",$date_time_start[1]);

  //HEURE DE FIN
  $date_time_end = explode(" ", $time_end);
  $date_end = explode("-",$date_time_end[0]);
  $hour_end = explode(":",$date_time_end[1]);

  if ($hour_end[0] === "23" ){
    $day_up = $date_end[2]+1;
    $new_end = $date_end[0]."-".$date_end[1]."-".$day_up." 00:".$hour_end[1].":".$hour_end[2];
  } else {
    $hour_up = $hour_end[0]+1;
    $new_end = $date_end[0]."-".$date_end[1]."-".$date_end[2]." ".$hour_up.":".$hour_end[1].":".$hour_end[2];
  }

  //HEURE NOW
  $date_time_now = explode(" ", $time_now);
  $date_now = explode("-",$date_time_now[0]);
  $hour_now = explode(":",$date_time_now[1]);

  require("../model/offer_of_the_hour_model.php ");
  $rand = $db_connexion->query($req_random)->fetch();
  $data = $db_connexion->query($req_bid)->fetch();
  $old_id = $data[1];
  $new_id = $rand[0];

  //INSERTION / UPDATE
  if ($day === $date_end[2] && $hour >= $hour_end[0] && $minute >= $hour_end[1] || $day > $date_end[2]){
    if ( $old_id === $new_id){
      header("location:../controller/bid_controller.php");
    } else {
      require("../model/offer_of_the_hour_model.php ");
      $price = $db_connexion->query($req_select_random)->fetch();
      $true_price = $price[4];
      $disc_price = $true_price-(20/100*$true_price);
      // MODIFICATION DE L'ANCIEN DISCOUNT PRIX PAR DEFAULT .
      require("../model/offer_of_the_hour_model.php ");
      $db_connexion->exec($req_old_price);
      $db_connexion->exec($req_low_status);
      // AJOUT DU NOUVEAU DISCOUNT
      require("../model/offer_of_the_hour_model.php ");
      $db_connexion->exec($req_new_discount);
      require("../model/offer_of_the_hour_model.php ");
      $data = $db_connexion->query($req_new_price)->fetch();
      header("Refresh:0");
    }
  //DISPLAY
  } else {
    echo "<form action='../controller/home_controller.php' method='get'><button>Back</button></form>";
      require("../model/offer_of_the_hour_model.php ");
      $article = $db_connexion->query($req_data_article)->fetch();
      echo "<h1>Offer of the hour !</h1>";
      echo "Description : ".$article[3]."<br>";
      echo "Price : ".$article[4]."<br>";
      echo "Quantity : ".$article[5]."<br>";
      if ( $article[6] === "0"){
        $sexe = "Male" ;
      }else if ( $article[6] === "1"){
        $sexe = "Female" ;
      }else{
        $sexe = "Hermaphrodite";
      }
      echo "Sexe : ".$sexe."<br>" ;
      echo "Diet : ".$article[7]."<br>";
      echo "Weight : ".$article[8]."<br>";
      echo "Size : ".$article[9]."<br>";
      echo "Color : ".$article[10]."<br>";
      echo "Age : ".$article[11]."<br>";
      echo "<img src='".$article[13]."'><br><br>";
      echo "<form action='../model/add_caddy.php?id=".$data[1]."' method='POST'><button>Add to the caddy</button></form>";

  }
?>
