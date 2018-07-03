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
//echo $year."-".$month."-".$day." ".$hour.":".$minute.":".$second;
$req_user =" SELECT * FROM articles WHERE status='bid'";
$data = $db_connexion->query($req_user)->fetchAll();
echo "<center><h2>Bids</h2></center>";
echo "<div id='box'><br>";
if (isset($_GET["success"])){
  echo "You offer is online ";
}
for ($i=0; $i < count($data) ; $i++) {
    $req_bid =" SELECT * FROM bids WHERE id_article='".$data[$i][0]."'";
    $bid = $db_connexion->query($req_bid)->fetch();

    $req_specie = "select name from species where id_specie='".$data[$i][1]."'";
    $specie = $db_connexion->query($req_specie)->fetch();

    $req_seller=" SELECT * FROM users WHERE id_user='".$data[$i][2]."'";
    $seller = $db_connexion->query($req_seller)->fetch();

    $req_bidder=" SELECT * FROM users WHERE id_user='".$bid[2]."'";
    $bidder = $db_connexion->query($req_bidder)->fetch();

    $full_date_end = explode(" ", $bid[5]);
    $date_end = explode("-",$full_date_end[0]);
    $hour_end = explode(":",$full_date_end[1]);

    echo $date_end[0]." > ".$year."<br>";
    echo $date_end[0]." == ".$year." && ".$date_end[1]." > ".$month."<br>";
    echo $date_end[0]." == ".$year." && ".$date_end[1]." == ".$month." && ". $date_end[2] ." > ".$day."<br>";
    echo $date_end[0]." == ".$year." && ".$date_end[1]." == ".$month." && ". $date_end[2] ." == ".$day." && ".$hour_end[0]." > ".$hour."<br>";
    echo $date_end[0]." == ".$year." && ".$date_end[1]." == ".$month." && ". $date_end[2] ." == ".$day." && ".$hour_end[0]." == ".$hour."<br>".$hour_end[1]." > ".$minute;


    if ( $date_end[0] > $year ||
          $date_end[0] == $year && $date_end[1] > $month ||
          $date_end[0] == $year && $date_end[1] == $month && $date_end[2] > $day ||
          $date_end[0] == $year && $date_end[1] == $month && $date_end[2] == $day && $hour_end[0] > $hour ||
          $date_end[0] == $year && $date_end[1] == $month && $date_end[2] == $day && $hour_end[0] == $hour && $hour_end[1] > $minute ) {

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
    echo "Initial price :".$bid[6]."<br>";
    echo "<b>End price :".$bid[7]."<b><br>";
    echo "Date start :".$bid[4]."<br>";
    echo "Date end :".$bid[5]."<br>";
    echo "Seller :".$seller[1]."<br>";
    echo "Last bidder :".$bidder[1]."<br>";
    echo "Cash Seller :".$seller[8]."<br>";
    echo "Cash Bidder :".$bidder[8]."<br>";
    $bid_monney = $bidder[8]-$bid[7];
    $sel_monney = $seller[8]+$bid[7];
    echo "Cash Bidder after :".$bid_monney;
    echo "Cash Seller after :".$sel_monney;

    echo "<form action='../controller/controller_bids.php' method='GET'><input type='hidden' name='id_bid' value='".$bid[0]."'><button class='button2'>Add an offer to the bid</button></form>";
  } else {

    //ALGO GESTION ANCIEN BIDS

    $bid_monney = $bidder[8]-$bid[7];
    $sel_monney = $seller[8]+$bid[7];

    $req_bid_less  ="UPDATE users SET balance= '".$bid_monney."' WHERE id_user ='".$bidder[0]."'";
    $req_bid = $db_connexion->prepare($req_bid_less);
    $req_bid->execute();

    $req_seller_more ="UPDATE users SET balance= '".$sel_monney."' WHERE id_user ='".$seller[0]."'";
    $req_sel = $db_connexion->prepare($req_seller_more);
    $req_sel->execute();

    $req_unavailable ="UPDATE articles SET status= 'unavailable' WHERE id_article ='".$data[$i][0]."'";
    $req_una = $db_connexion->prepare($req_unavailable);
    $req_una->execute();

    $req_monney_user =" SELECT * FROM users WHERE id_user='".$_SESSION['id']."'";
    $data_mu = $db_connexion->query($req_monney_user)->fetch();

    $_SESSION["monney"] = $data_mu[8];
    header("refresh:0");
  }
}
echo "<br><br><br></div>";
}else if ( isset($_GET['bid']) && isset($_GET['id_bid'])){
  $req_bid =" SELECT * FROM bids WHERE id_bi='".$_GET['id_bid']."'";
  $bid = $db_connexion->query($req_bid)->fetch();
  $price = $bid[7]+1;

  if( $_GET['bid'] < $price ){
    header("location:../controller/controller_bids.php?error=price&id_bid=$_GET[id_bid]");
  } else {
    $req_up_article  ="UPDATE articles SET  unit_price= '".$_GET['bid']."' WHERE id_article ='".$bid[1]."'";
    $req_article = $db_connexion->prepare($req_up_article);
    $req_article->execute();
    $req_up_bid ="UPDATE bids SET  end_price= '".$_GET['bid']."' WHERE id_article = '".$bid[1]."'";
    $req_bid = $db_connexion->prepare($req_up_bid);
    $req_bid->execute();
    $req_up_client ="UPDATE bids SET  id_bidder= '".$_SESSION['ID']."' WHERE id_article = '".$bid[1]."'";
    $req_client = $db_connexion->prepare($req_up_client);
    $req_client->execute();
    header("location:../controller/controller_bids.php?success=true");
  }
}else {
    $req_bid =" SELECT * FROM bids WHERE id_bi='".$_GET['id_bid']."'";
    $bid = $db_connexion->query($req_bid)->fetch();
    $price = $bid[7]+1;
    echo "<h2><center>Enter your offer</center></h2><div id='box2'>The minimum price is ".$price."
    <form action='controller_bids.php' method='GET'>
    <input type='number' name='bid' value=''>
    <input type='hidden' name='id_bid' value='".$_GET['id_bid']."'>";

    if ( isset($_GET["error"])){
      echo "<br>Please enter a price more expensive than the actual offer .<br>";
    }

    echo"<button class='button1'>Add this offer</button><form>";
  }
?>
