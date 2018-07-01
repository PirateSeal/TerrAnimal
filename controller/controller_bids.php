<?php
require("../controller/loged_or_not.php");
require("../controller/db_connexion.php");
require("../view/header.php");

if (!isset($_GET["id_bid"]) && !isset($_GET["bid"])){
$year = date("Y");
$month = date("m");
$day = date("d");
$hour = date("H");
$minute = date("i");
$second = date("s");
echo $year."-".$month."-".$day." ".$hour.":".$minute.":".$second;


$req_user =" SELECT * FROM articles WHERE status='bid'";
$data = $db_connexion->query($req_user)->fetchAll();

echo "<div id='box'><br>";

for ($i=0; $i < count($data) ; $i++) {
    $req_bid =" SELECT * FROM bids WHERE id_article='".$data[$i][0]."'";
    $bid = $db_connexion->query($req_bid)->fetch();

    $req_specie = "select name from species where id_specie='".$data[$i][1]."'";
    $specie = $db_connexion->query($req_specie)->fetch();

    $full_date_end = explode(" ", $bid[4]);
    $date_end = explode("-",$full_date_end[0]);
    $hour_end = explode(":",$full_date_end[1]);

    echo $date_end[2];
    if ( $date_end[0] >= $year || $date_end[0] >= $year && $date_end[1] >= $month || $date_end[0] >= $year && $date_end[1] >= $month && $date_end[2] >= $day ) {

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
    echo "<form action='../controller/controller_bids.php' method='GET'><input type='hidden' name='id_bid' value='".$bid[0]."'><button class='button2'>Add an offer to the bid</button></form>";
  } else {
    echo "Désactivation de l'enchère et debitation du compte acheteur";
  }
}
echo "<br><br><br></div>";
}else if ( isset($_GET['bid']) && isset($_GET['id_bid'])){
  $req_bid =" SELECT * FROM bids WHERE id_bi='".$_GET['id_bid']."'";
  $bid = $db_connexion->query($req_bid)->fetch();
  $price = $bid[6]+1;

  if( $_GET['bid'] < $price ){
    header("location:../controller/controller_bids.php?error=price&id_bid=$_GET[id_bid]");
  } else {
    echo "ALGO AJOUT DU NOOUVEAU PRIX ET CLIENT";
  }
}else {
    $req_bid =" SELECT * FROM bids WHERE id_bi='".$_GET['id_bid']."'";
    $bid = $db_connexion->query($req_bid)->fetch();
    $price = $bid[6]+1;
    echo "<h2><center>Enter your offer</center></h2><div id='box2'>The minimum price is ".$price."
    <form action='controller_bids.php' method='GET'>
    <input type='number' name='bid' value=''>
    <input type='hidden' name='id_bid' value='".$_GET['id_bid']."'>";

    if ( isset($_GET["error"])){
      echo "<br>Please enter a price more expensive than the actual offer .<br>";
    }

    echo"<button class='button1'>Add this offer</button>
    <form>";
  }
?>
